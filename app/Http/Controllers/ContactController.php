<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function send(Request $request)
    {        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'company' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:3000',
            // 'g-recaptcha-response' => 'required|captcha', // 
        ], [
            'name.required' => 'Le nom - prénom est obligatoire.',
            'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'phone.required' => 'Le téléphone est obligatoire.',
            'phone.max' => 'Le numéro de téléphone ne peut pas dépasser 20 caractères.',
            'email.required' => 'L\'email est obligatoire.',
            'email.email' => 'L\'email doit être une adresse valide.',
            'company.max' => 'Le nom de l\'entreprise ne peut pas dépasser 255 caractères.',
            'subject.required' => 'Le type de solution est obligatoire.',
            'subject.max' => 'Le type de solution ne peut pas dépasser 255 caractères.',
            'message.required' => 'Le message est obligatoire.',
            'message.max' => 'Le message ne peut pas dépasser 3000 caractères.',
            // 'g-recaptcha-response.required' => 'Veuillez valider le captcha.',
        ]);

        $messageContent = "=== NOUVELLE DEMANDE TÉLÉCOM ===\n\n";
        $messageContent .= "Nom: " . $validatedData['name'] . "\n";
        $messageContent .= "Email: " . $validatedData['email'] . "\n";
        $messageContent .= "Téléphone: " . $validatedData['phone'] . "\n";
        $messageContent .= "Entreprise: " . ($validatedData['company'] ?? 'Non renseignée') . "\n";
        $messageContent .= "Nombre d'utilisateurs: " . ($validatedData['budget'] ? $validatedData['budget'] : 'Non renseigné') . "\n";
        $messageContent .= "Type de solution: " . $validatedData['subject'] . "\n";
        $messageContent .= "\n--- DESCRIPTION DU PROJET ---\n";
        $messageContent .= $validatedData['message'];
        $messageContent .= "\n\n--- FIN DU MESSAGE ---";

        try {
            Mail::raw($messageContent, function ($message) use ($validatedData) {
                $message->from('contact@tonsite.fr', 'Contact Site Web')
                    ->to('admin@tonsite.fr')
                    ->subject('Nouveau message via le formulaire de contact')
                    ->replyTo($validatedData['email'], $validatedData['name']);
            });

            return redirect()->to('/#contact')->with('success', 'Votre demande a été envoyée avec succès ! Notre équipe technique vous contactera rapidement pour étudier votre projet télécom.');
            
        } catch (\Exception $e) {

            Log::error('Erreur envoi email contact: ' . $e->getMessage());
            
            return redirect()->to('/#contact')->with('error', 'Une erreur est survenue lors de l\'envoi. Veuillez réessayer ou nous contacter directement.');
        }
    }
}