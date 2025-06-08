<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Services\GoogleCalendarService;

class ContactController extends Controller
{
    protected $calendarService;

    public function __construct(GoogleCalendarService $calendarService)
    {
        $this->calendarService = $calendarService;
    }

    public function send(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'company' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'request_type' => 'required|in:information,rendez_vous',
            'commercial' => 'required_if:request_type,rendez_vous|nullable|integer',
            'rdv_date' => 'required_if:request_type,rendez_vous|nullable|date|after:today',
            'rdv_time' => 'required_if:request_type,rendez_vous|nullable|string',
            'message' => 'required|string|max:3000',
        ], [
            'name.required' => 'Le nom - prénom est obligatoire.',
            'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'phone.required' => 'Le téléphone est obligatoire.',
            'phone.max' => 'Le numéro de téléphone ne peut pas dépasser 20 caractères.',
            'email.required' => 'L\'email est obligatoire.',
            'email.email' => 'L\'email doit être une adresse valide.',
            'company.max' => 'Le nom de l\'entreprise ne peut pas dépasser 255 caractères.',
            'subject.required' => 'Le sujet du contact est obligatoire.',
            'subject.max' => 'Le sujet ne peut pas dépasser 255 caractères.',
            'request_type.required' => 'Le type de demande est obligatoire.',
            'request_type.in' => 'Le type de demande doit être "information" ou "rendez_vous".',
            'commercial.required_if' => 'Le choix du commercial est obligatoire pour un rendez-vous.',
            'commercial.integer' => 'Le commercial sélectionné n\'est pas valide.',
            'rdv_date.required_if' => 'La date est obligatoire pour un rendez-vous.',
            'rdv_date.date' => 'La date doit être une date valide.',
            'rdv_date.after' => 'La date du rendez-vous doit être ultérieure à aujourd\'hui.',
            'rdv_time.required_if' => 'L\'heure est obligatoire pour un rendez-vous.',
            'message.required' => 'Le message est obligatoire.',
            'message.max' => 'Le message ne peut pas dépasser 3000 caractères.',
        ]);

        try {
            $rdvResult = null;

            // Si c'est une demande de rendez-vous, créer l'événement dans Google Calendar
            if ($validatedData['request_type'] === 'rendez_vous') {
                $rdvResult = $this->createRendezVous($validatedData);

                if ($rdvResult['status'] === 'ERROR') {
                    Log::error('Erreur création RDV: ' . $rdvResult['message']);
                    return redirect()->back()->with(
                        'error',
                        'Erreur lors de la planification du rendez-vous : ' . $rdvResult['message']
                    );
                }
            }

            // Envoi de l'email de notification
            $this->sendEmail($validatedData, $rdvResult);

            // Message de succès personnalisé selon le type de demande
            $successMessage = $validatedData['request_type'] === 'rendez_vous'
                ? 'Votre rendez-vous a été planifié avec succès ! Vous recevrez une confirmation par email et le commercial vous contactera si nécessaire.'
                : 'Votre demande a été envoyée avec succès ! Notre équipe technique vous contactera rapidement pour étudier votre projet télécom.';

            return redirect()->back()->with('success', $successMessage);

        } catch (\Exception $e) {
            Log::error('Erreur envoi contact/RDV: ' . $e->getMessage());
            return redirect()->back()->with(
                'error',
                'Une erreur est survenue lors de l\'envoi. Veuillez réessayer ou nous contacter directement.'
            );
        }
    }

    /**
     * Créer un rendez-vous dans Google Calendar
     */
    private function createRendezVous($data)
    {
        try {
            // Récupérer les informations du commercial sélectionné
            $commerciaux = config('commerciaux.commerciaux');
            $commercial = collect($commerciaux)->firstWhere('id', (int) $data['commercial']);

            if (!$commercial) {
                return ['status' => 'ERROR', 'message' => 'Commercial introuvable'];
            }

            // NOUVEAU : Vérifier la disponibilité du créneau
            $availabilityCheck = $this->calendarService->isTimeSlotAvailable(
                $commercial['calendar_id'],
                $data['rdv_date'],
                $data['rdv_time'],
                60 // 60 minutes par défaut
            );

            if (!$availabilityCheck['available']) {
                return [
                    'status' => 'ERROR',
                    'message' => 'Ce créneau n\'est plus disponible. ' . $availabilityCheck['message']
                ];
            }

            // Si disponible, créer l'événement
            return $this->calendarService->createRendezVous(
                $commercial['calendar_id'],
                $data['rdv_date'],
                $data['rdv_time'],
                $data['name'],
                $data['email'],
                $data['phone'],
                $data['company'] ?? 'Non renseignée',
                $data['subject'],
                $data['message'],
                $commercial['nom']
            );

        } catch (\Exception $e) {
            Log::error('Erreur création RDV dans createRendezVous: ' . $e->getMessage());
            return ['status' => 'ERROR', 'message' => 'Erreur technique lors de la création du rendez-vous'];
        }
    }

    /**
     * Envoyer l'email de notification
     */
    private function sendEmail($data, $rdvResult = null)
    {
        // Construction du contenu de l'email
        $messageContent = "=== NOUVELLE DEMANDE TÉLÉCOM ===\n\n";
        $messageContent .= "Type de demande: " . ($data['request_type'] === 'rendez_vous' ? 'PRISE DE RENDEZ-VOUS' : 'DEMANDE D\'INFORMATION') . "\n\n";

        $messageContent .= "=== INFORMATIONS CLIENT ===\n";
        $messageContent .= "Nom: " . $data['name'] . "\n";
        $messageContent .= "Email: " . $data['email'] . "\n";
        $messageContent .= "Téléphone: " . $data['phone'] . "\n";
        $messageContent .= "Entreprise: " . ($data['company'] ?? 'Non renseignée') . "\n";
        $messageContent .= "Sujet: " . $data['subject'] . "\n\n";

        // Si c'est un rendez-vous, ajouter les informations RDV
        if ($data['request_type'] === 'rendez_vous' && $rdvResult && $rdvResult['status'] === 'SUCCESS') {
            $commerciaux = config('commerciaux.commerciaux');
            $commercial = collect($commerciaux)->firstWhere('id', (int) $data['commercial']);

            $messageContent .= "=== INFORMATIONS RENDEZ-VOUS ===\n";
            $messageContent .= "Commercial: " . ($commercial['nom'] ?? 'Inconnu') . "\n";
            $messageContent .= "Date: " . \Carbon\Carbon::parse($data['rdv_date'])->format('d/m/Y') . "\n";
            $messageContent .= "Heure: " . $data['rdv_time'] . "\n";

            if (isset($rdvResult['event_link'])) {
                $messageContent .= "Lien Google Calendar: " . $rdvResult['event_link'] . "\n";
            }
            $messageContent .= "\n";
        }

        $messageContent .= "=== MESSAGE DU CLIENT ===\n";
        $messageContent .= $data['message'];
        $messageContent .= "\n\n=== FIN DU MESSAGE ===";

        // Envoi de l'email
        Mail::raw($messageContent, function ($message) use ($data) {
            $subject = $data['request_type'] === 'rendez_vous'
                ? 'Nouveau rendez-vous planifié via le site web'
                : 'Nouveau message via le formulaire de contact';

            $message->from('contact@tonsite.fr', 'Contact Site Web')
                ->to('admin@tonsite.fr')
                ->subject($subject)
                ->replyTo($data['email'], $data['name']);
        });
    }
}