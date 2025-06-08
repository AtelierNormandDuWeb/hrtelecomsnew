<?php

namespace App\Services;

use Google\Client;
use Google\Service\Calendar;
use Google\Service\Calendar\Event;
use Google\Service\Calendar\EventDateTime;
use Exception;
use Illuminate\Support\Facades\Log;

class GoogleCalendarService
{
    private $client;
    private $service;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setApplicationName(config('services.google.application_name'));
        $this->client->setAuthConfig(storage_path('app/google/service-account-key.json'));
        $this->client->addScope(Calendar::CALENDAR);

        $this->service = new Calendar($this->client);
    }

    public function test()
    {
        return "Google Calendar Service initialized!";
    }

    public function listCalendars()
    {
        try {
            $calendarList = $this->service->calendarList->listCalendarList();
            $calendars = [];

            foreach ($calendarList->getItems() as $calendar) {
                $calendars[] = [
                    'id' => $calendar->getId(),
                    'summary' => $calendar->getSummary(),
                    'primary' => $calendar->getPrimary()
                ];
            }

            return $calendars;
        } catch (Exception $e) {
            return "Erreur: " . $e->getMessage();
        }
    }
    public function debugConnection()
    {
        try {
            // Test basique de connexion
            $calendarList = $this->service->calendarList->listCalendarList();

            return [
                'connection' => 'OK',
                'calendars_count' => count($calendarList->getItems()),
                'service_email' => 'laravel-calendar-booking@hrtelecoms-462011.iam.gserviceaccount.com'
            ];
        } catch (Exception $e) {
            return [
                'connection' => 'ERROR',
                'message' => $e->getMessage()
            ];
        }
    }
    public function testDirectAccess($calendarId)
    {
        try {
            // Test d'accès direct à un agenda spécifique
            $calendar = $this->service->calendars->get($calendarId);

            return [
                'access' => 'OK',
                'calendar_id' => $calendar->getId(),
                'calendar_summary' => $calendar->getSummary(),
                'timezone' => $calendar->getTimeZone()
            ];
        } catch (Exception $e) {
            return [
                'access' => 'ERROR',
                'message' => $e->getMessage()
            ];
        }
    }

    // TEST
    public function createTestEvent($calendarId)
    {
        try {
            $event = new Event([
                'summary' => 'Test RDV - Laravel',
                'description' => 'Événement de test créé depuis Laravel',
                'start' => [
                    'dateTime' => '2025-06-10T10:00:00',
                    'timeZone' => 'Europe/Paris',
                ],
                'end' => [
                    'dateTime' => '2025-06-10T11:00:00',
                    'timeZone' => 'Europe/Paris',
                ],
                // Supprimé la ligne 'attendees' qui causait l'erreur
            ]);

            $createdEvent = $this->service->events->insert($calendarId, $event);

            return [
                'status' => 'SUCCESS',
                'event_id' => $createdEvent->getId(),
                'event_link' => $createdEvent->getHtmlLink(),
                'start_time' => $createdEvent->getStart()->getDateTime()
            ];

        } catch (Exception $e) {
            return [
                'status' => 'ERROR',
                'message' => $e->getMessage()
            ];
        }
    }
    public function getCommerciaux()
    {
        return config('commerciaux.commerciaux');
    }

    public function createRendezVous($calendarId, $date, $time, $clientName, $clientEmail, $clientPhone, $company, $subject, $message, $commercialName)
    {
        try {
            // Construire la date/heure de début et fin
            $startDateTime = $date . 'T' . $time . ':00';
            $endTime = date('H:i', strtotime($time . ' +1 hour')); // RDV d'1 heure par défaut
            $endDateTime = $date . 'T' . $endTime . ':00';

            // Créer la description de l'événement
            $description = "=== RENDEZ-VOUS CLIENT ===\n\n";
            $description .= "Client: " . $clientName . "\n";
            $description .= "Email: " . $clientEmail . "\n";
            $description .= "Téléphone: " . $clientPhone . "\n";
            $description .= "Entreprise: " . $company . "\n";
            $description .= "Sujet: " . $subject . "\n\n";
            $description .= "Message:\n" . $message;

            $event = new Event([
                'summary' => 'RDV - ' . $clientName . ' (' . $company . ')',
                'description' => $description,
                'start' => [
                    'dateTime' => $startDateTime,
                    'timeZone' => 'Europe/Paris',
                ],
                'end' => [
                    'dateTime' => $endDateTime,
                    'timeZone' => 'Europe/Paris',
                ],
            ]);

            $createdEvent = $this->service->events->insert($calendarId, $event);

            return [
                'status' => 'SUCCESS',
                'event_id' => $createdEvent->getId(),
                'event_link' => $createdEvent->getHtmlLink(),
                'start_time' => $createdEvent->getStart()->getDateTime(),
                'commercial' => $commercialName
            ];

        } catch (Exception $e) {
            return [
                'status' => 'ERROR',
                'message' => $e->getMessage()
            ];
        }
    }

    public function isTimeSlotAvailable($calendarId, $date, $time, $duration = 60)
    {
        try {
            // DÉBOGAGE : Ajoutons des logs
            Log::info('Vérification créneau:', [
                'calendar' => $calendarId,
                'date' => $date,
                'time' => $time,
                'duration' => $duration
            ]);

            // Construire les dates de début et fin du créneau souhaité
            $startDateTime = $date . 'T' . $time . ':00';
            $endTime = date('H:i', strtotime($time . ' +' . $duration . ' minutes'));
            $endDateTime = $date . 'T' . $endTime . ':00';

            Log::info('Période à vérifier:', [
                'start' => $startDateTime,
                'end' => $endDateTime
            ]);

            // Rechercher les événements existants sur cette période
            $timezone = new \DateTimeZone('Europe/Paris');
            $startDateTimeObj = new \DateTime($startDateTime, $timezone);
            $endDateTimeObj = new \DateTime($endDateTime, $timezone);

            $timeMin = $startDateTimeObj->format(\DateTime::RFC3339);
            $timeMax = $endDateTimeObj->format(\DateTime::RFC3339);

            Log::info('Recherche événements avec timezone:', [
                'timeMin' => $timeMin,
                'timeMax' => $timeMax,
                'timezone' => 'Europe/Paris'
            ]);

            Log::info('Recherche événements:', [
                'timeMin' => $timeMin,
                'timeMax' => $timeMax
            ]);

            $optParams = [
                'timeMin' => $timeMin,
                'timeMax' => $timeMax,
                'singleEvents' => true,
                'orderBy' => 'startTime',
            ];

            $events = $this->service->events->listEvents($calendarId, $optParams);

            Log::info('Événements trouvés:', [
                'count' => count($events->getItems()),
                'events' => $this->formatConflicts($events->getItems())
            ]);

            // Si des événements existent sur cette période, le créneau n'est pas disponible
            if (count($events->getItems()) > 0) {
                return [
                    'available' => false,
                    'conflicts' => $this->formatConflicts($events->getItems()),
                    'message' => 'Ce créneau est déjà occupé'
                ];
            }

            return [
                'available' => true,
                'message' => 'Créneau disponible'
            ];

        } catch (\Exception $e) {
            Log::error('Erreur vérification créneau: ' . $e->getMessage());
            return [
                'available' => false,
                'message' => 'Erreur lors de la vérification : ' . $e->getMessage()
            ];
        }
    }

    private function formatConflicts($events)
    {
        $conflicts = [];
        foreach ($events as $event) {
            $conflicts[] = [
                'summary' => $event->getSummary(),
                'start' => $event->getStart()->getDateTime(),
                'end' => $event->getEnd()->getDateTime(),
            ];
        }
        return $conflicts;
    }

    public function getAvailableTimeSlots($calendarId, $date, $workingHours = ['09:00', '17:00'], $slotDuration = 60)
    {
        try {
            // Horaires de travail par défaut : 9h-17h
            $startHour = $workingHours[0];
            $endHour = $workingHours[1];

            // Générer tous les créneaux possibles
            $possibleSlots = [];
            $timezone = new \DateTimeZone('Europe/Paris'); // ← Ajout du timezone
            $current = strtotime($date . ' ' . $startHour);
            $end = strtotime($date . ' ' . $endHour);

            while ($current < $end) {
                $timeSlot = date('H:i', $current);
                $possibleSlots[] = $timeSlot;
                $current += ($slotDuration * 60);
            }

            // Vérifier la disponibilité de chaque créneau
            $availableSlots = [];
            foreach ($possibleSlots as $slot) {
                $check = $this->isTimeSlotAvailable($calendarId, $date, $slot, $slotDuration);
                if ($check['available']) {
                    $availableSlots[] = $slot;
                }
            }

            return [
                'status' => 'SUCCESS',
                'date' => $date,
                'available_slots' => $availableSlots,
                'total_slots' => count($availableSlots)
            ];

        } catch (Exception $e) {
            return [
                'status' => 'ERROR',
                'message' => $e->getMessage()
            ];
        }
    }
}