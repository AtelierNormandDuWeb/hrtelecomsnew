<?php

namespace App\Services;

use Google\Client;
use Google\Service\Calendar;
use Google\Service\Calendar\Event;
use Google\Service\Calendar\EventDateTime;

class GoogleCalendarService
{
    private $client;
    private $service;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setApplicationName(env('GOOGLE_CALENDAR_APPLICATION_NAME'));
        $this->client->setAuthConfig(storage_path('app/google/service-account-key.json'));
        $this->client->addScope(Calendar::CALENDAR);
        
        $this->service = new Calendar($this->client);
    }

    public function test()
    {
        return "Google Calendar Service initialized successfully!";
    }
}