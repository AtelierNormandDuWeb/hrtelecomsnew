<?php
// app/Http/Controllers/AppointmentController.php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Mail\AppointmentRequest;
use Illuminate\Support\Facades\Mail;
use App\Services\GoogleCalendarService;

class AppointmentController extends Controller
{
    protected $googleCalendarService;
    
    public function __construct(GoogleCalendarService $googleCalendarService)
    {
        $this->googleCalendarService = $googleCalendarService;
    }
    
    public function showForm()
    {
        return view('appointments.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'message' => 'required|string',
        ]);

        // Combiner la date et l'heure
        $appointmentDateTime = $validated['appointment_date'] . ' ' . $validated['appointment_time'];
        
        // Créer le rendez-vous
        $appointment = Appointment::create([
            'name' => $validated['name'],
            'company' => $validated['company'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'appointment_date' => $appointmentDateTime,
            'message' => $validated['message'],
        ]);

        // Vérifier si Google Calendar est connecté
        if ($this->googleCalendarService->isConnected()) {
            // Créer un événement Google Calendar
            $googleEventId = $this->googleCalendarService->createEvent($appointment);
            
            if ($googleEventId) {
                $appointment->google_event_id = $googleEventId;
                $appointment->save();
            }
        }

        // Envoyer l'e-mail
        Mail::to(config('app.admin_email'))->send(new AppointmentRequest($appointment));

        return redirect()->back()->with('success', 'Votre demande de rendez-vous a été envoyée avec succès.');
    }

    public function confirmAppointment($appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);
        $appointment->is_confirmed = true;
        $appointment->save();

        // Ici, vous pourriez envoyer un e-mail de confirmation au client

        return redirect()->back()->with('success', 'Le rendez-vous a été confirmé.');
    }
    
    // Méthodes pour la gestion de l'authentification Google
    public function redirectToGoogleAuth()
    {
        return redirect()->away($this->googleCalendarService->getAuthUrl());
    }
    
    public function handleGoogleCallback(Request $request)
    {
        if (!$request->has('code')) {
            return redirect()->route('home')->with('error', 'Authentification Google annulée.');
        }
        
        $this->googleCalendarService->handleCallback($request->code);
        
        return redirect()->route('admin.settings')->with('success', 'Votre compte Google Calendar a été connecté avec succès.');
    }
}