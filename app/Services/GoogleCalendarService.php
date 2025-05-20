<?php

namespace App\Services;

use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Illuminate\Support\Facades\File;
use App\Models\Appointment;

class GoogleCalendarService
{
    protected $client;
    protected $service;

    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setApplicationName(config('app.name'));
        $this->client->setScopes(Google_Service_Calendar::CALENDAR);
        
        // Utilisation des identifiants de configuration
        $this->client->setClientId(config('google-calendar.client_id'));
        $this->client->setClientSecret(config('google-calendar.client_secret'));
        $this->client->setRedirectUri(config('google-calendar.redirect_uri'));
        $this->client->setAccessType('offline');
        $this->client->setPrompt('select_account consent');
        
        // Vérifier si un token existe et l'utiliser
        $tokenPath = config('google-calendar.token_file');
        if (File::exists($tokenPath)) {
            $accessToken = json_decode(File::get($tokenPath), true);
            $this->client->setAccessToken($accessToken);
        }
        
        // Rafraîchissement du token si nécessaire
        if ($this->client->isAccessTokenExpired()) {
            if ($this->client->getRefreshToken()) {
                $this->client->fetchAccessTokenWithRefreshToken($this->client->getRefreshToken());
                File::put($tokenPath, json_encode($this->client->getAccessToken()));
            }
        }
        
        $this->service = new Google_Service_Calendar($this->client);
    }
    
    public function getAuthUrl()
    {
        return $this->client->createAuthUrl();
    }
    
    public function handleCallback($authCode)
    {
        $accessToken = $this->client->fetchAccessTokenWithAuthCode($authCode);
        $this->client->setAccessToken($accessToken);
        
        // Enregistrer le token pour une utilisation future
        if (!File::exists(dirname(config('google-calendar.token_file')))) {
            File::makeDirectory(dirname(config('google-calendar.token_file')), 0755, true);
        }
        
        File::put(config('google-calendar.token_file'), json_encode($this->client->getAccessToken()));
        
        return $accessToken;
    }
    
    public function isConnected()
    {
        return $this->client->getAccessToken() && !$this->client->isAccessTokenExpired();
    }
    
    public function createEvent(Appointment $appointment)
    {
        if (!$this->isConnected()) {
            return null;
        }
        
        $event = new Google_Service_Calendar_Event([
            'summary' => 'Rendez-vous avec ' . $appointment->name . ($appointment->company ? ' (' . $appointment->company . ')' : ''),
            'description' => "Informations du contact:\n" .
                            "Email: " . $appointment->email . "\n" .
                            "Téléphone: " . $appointment->phone . "\n\n" .
                            "Message:\n" . $appointment->message,
            'start' => [
                'dateTime' => $appointment->appointment_date->format('c'),
                'timeZone' => config('app.timezone'),
            ],
            'end' => [
                'dateTime' => $appointment->appointment_date->copy()->addMinutes(60)->format('c'),
                'timeZone' => config('app.timezone'),
            ],
            'reminders' => [
                'useDefault' => false,
                'overrides' => [
                    ['method' => 'email', 'minutes' => 24 * 60],
                    ['method' => 'popup', 'minutes' => 30],
                ],
            ],
        ]);
        
        try {
            $calendarId = config('google-calendar.calendar_id');
            $event = $this->service->events->insert($calendarId, $event);
            return $event->getId();
        } catch (\Exception $e) {
            \Log::error('Google Calendar Error: ' . $e->getMessage());
            return null;
        }
    }
    
    public function getEventUrl($eventId)
    {
        if (!$eventId) {
            return null;
        }
        
        return 'https://calendar.google.com/calendar/event?eid=' . base64_encode($eventId);
    }
}