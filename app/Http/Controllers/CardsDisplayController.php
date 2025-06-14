<?php

namespace App\Http\Controllers;

use App\Models\Cards;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;

class CardsDisplayController extends Controller
{
    /**
     * Affiche la page principale du trombinoscope
     */
    public function index(): View
    {
        return view('cards.trombinoscope');
    }

    /**
     * Retourne les cards au format JSON pour le JavaScript
     */
    public function getCardsJson(): JsonResponse
    {
        try {
            $cards = Cards::ordered()->get();
            
            $formattedCards = $cards->map(function ($card) {
                return [
                    'card_id' => $card->id,
                    'name' => $card->name,
                    'title' => $card->title,
                    'subtitle' => $card->subtitle,
                    'description' => $card->description,
                    'details' => $this->formatDetails($card->details),
                    'contact_info' => $this->formatContactInfo($card->contact_info),
                    'avatar_url' => $this->getImageUrl($card->avatar_url),
                    'background_url' => $this->getImageUrl($card->background_url),
                    'sort_order' => $card->sort_order
                ];
            });

            return response()->json($formattedCards);
            
        } catch (\Exception $e) {
            \Log::error('Erreur lors de la récupération des cards:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'error' => 'Erreur lors du chargement des données'
            ], 500);
        }
    }

    /**
     * Formate l'URL des images
     */
    private function getImageUrl(?string $imagePath): string
    {
        if (!$imagePath) {
            return asset('images/default-avatar.png'); // Image par défaut
        }

        // Si c'est déjà une URL complète
        if (str_starts_with($imagePath, 'http')) {
            return $imagePath;
        }

        // Si c'est un chemin local
        return asset($imagePath);
    }

    /**
     * Formate les détails pour l'affichage
     */
    private function formatDetails($details): array
    {
        if (is_string($details)) {
            // Si c'est du JSON stocké en string
            $decoded = json_decode($details, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                return $decoded;
            }
            
            // Si c'est du texte simple, on le retourne comme description
            return ['Description' => $details];
        }

        if (is_array($details)) {
            return $details;
        }

        return [];
    }

    /**
     * Formate les informations de contact
     */
    private function formatContactInfo($contactInfo): array
    {
        if (is_string($contactInfo)) {
            // Si c'est du JSON stocké en string
            $decoded = json_decode($contactInfo, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                return $decoded;
            }
            
            // Si c'est du texte simple, on le parse
            return $this->parseContactString($contactInfo);
        }

        if (is_array($contactInfo)) {
            return $contactInfo;
        }

        return [];
    }

    /**
     * Parse une chaîne de contact simple
     */
    private function parseContactString(string $contact): array
    {
        $result = [];
        
        // Détection d'email
        if (filter_var($contact, FILTER_VALIDATE_EMAIL)) {
            $result['Email'] = $contact;
        }
        // Détection de téléphone (pattern simple)
        elseif (preg_match('/^[\d\s\+\-\(\)\.]+$/', trim($contact))) {
            $result['Téléphone'] = $contact;
        }
        // Sinon, c'est du texte général
        else {
            $result['Contact'] = $contact;
        }

        return $result;
    }
}