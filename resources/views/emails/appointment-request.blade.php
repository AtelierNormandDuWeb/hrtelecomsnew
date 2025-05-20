<!-- resources/views/emails/appointment-request.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nouvelle demande de rendez-vous</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            margin-top: 10rem;
        }
        .header {
            background-color: #f5f5f5;
            padding: 15px;
            border-bottom: 3px solid #3490dc;
            margin-bottom: 20px;
        }
        .appointment-details {
            background-color: #f9f9f9;
            padding: 15px;
            margin-bottom: 20px;
            border-left: 3px solid #3490dc;
        }
        .btn {
            display: inline-block;
            background-color: #3490dc;
            color: black;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 15px;
            margin-right: 10px;
        }
        .calendar-btn {
            background-color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Nouvelle demande de rendez-vous</h1>
        </div>
        
        <p>Vous avez reçu une nouvelle demande de rendez-vous avec les détails suivants :</p>
        
        <div class="appointment-details">
            <p><strong>Nom :</strong> {{ $appointment->name }}</p>
            @if($appointment->company)
                <p><strong>Entreprise :</strong> {{ $appointment->company }}</p>
            @endif
            <p><strong>Email :</strong> {{ $appointment->email }}</p>
            <p><strong>Téléphone :</strong> {{ $appointment->phone }}</p>
            <p><strong>Date et heure :</strong> {{ $appointment->appointment_date->format('d/m/Y à H:i') }}</p>
            <p><strong>Message :</strong> {{ $appointment->message }}</p>
        </div>
        
        <div>
            <a href="{{ route('appointments.confirm', ['appointmentId' => $appointment->id]) }}" class="btn">Confirmer le rendez-vous</a>
            
            @if($appointment->google_event_id)
                <a href="https://calendar.google.com/calendar/event?eid={{ base64_encode($appointment->google_event_id) }}" target="_blank" class="btn calendar-btn">
                    Voir dans Google Calendar
                </a>
            @endif
        </div>
        
        @if(!$appointment->google_event_id && app()->make('App\Services\GoogleCalendarService')->isConnected())
            <p style="margin-top: 20px;">
                <em>Note: Pour cette demande, l'événement n'a pas pu être ajouté à Google Calendar. 
                Veuillez vérifier votre connexion avec Google Calendar.</em>
            </p>
        @elseif(!app()->make('App\Services\GoogleCalendarService')->isConnected())
            <p style="margin-top: 20px;">
                <em>Note: Votre compte n'est pas connecté à Google Calendar. 
                <a href="{{ route('google-calendar.auth') }}">Cliquez ici pour connecter votre compte Google Calendar</a>.</em>
            </p>
        @endif
    </div>
</body>
</html>