<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Normaliser le budget pour enlever les caractères non numériques
        $request->merge([
            'budget' => preg_replace('/[^\d.]/', '', str_replace(',', '.', $request->input('budget')))
        ]);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:15',
            'promo' => 'nullable|string|max:20',
            'budget' => 'nullable|numeric|min:0',
            'travaux' => 'required|string|max:50',
            'message' => 'required|string|max:3000',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        // 📬 Contenu du message à envoyer
        $messageContent = "Nom: " . $validatedData['name'] . "\n";
        $messageContent .= "Email: " . $validatedData['email'] . "\n";
        $messageContent .= "Téléphone: " . ($validatedData['phone'] ?? 'Non renseigné') . "\n";
        $messageContent .= "promo: " . $validatedData['promo'] . "\n";
        $messageContent .= "budget: " . $validatedData['budget'] . " €" ."\n";
        $messageContent .= "travaux: " . $validatedData['travaux'] . "\n";
        $messageContent .= "\nMessage:\n" . $validatedData['message'];

        // 📨 Envoi de l'e-mail
        Mail::raw($messageContent, function ($message) use ($validatedData) {
            $message->from('contact@zelecrenovation.fr', 'ZElect & Rénovation Contact')
                ->to('z.renov14@gmail.com')
                ->subject('Nouveau message via le formulaire de contact')
                ->replyTo($validatedData['email'], $validatedData['name']);
        });

        // 🔁 Redirection avec message de succès
        return redirect()->to('/#contact')->with('success', 'Votre message a été envoyé avec succès.');
    }
}