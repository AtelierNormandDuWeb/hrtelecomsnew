<?php
// config/google-calendar.php

return [
    /*
    |--------------------------------------------------------------------------
    | Google Calendar API Credentials
    |--------------------------------------------------------------------------
    */
    'client_id' => env('GOOGLE_CALENDAR_CLIENT_ID', '465848132435-iov8gaon2dei6dvqaarhdltg0ikf49uh.apps.googleusercontent.com'),
    'client_secret' => env('GOOGLE_CALENDAR_CLIENT_SECRET', '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'),
    'redirect_uri' => env('GOOGLE_CALENDAR_REDIRECT_URI', config('app.url') . '/google-calendar/callback'),
    'project_id' => env('GOOGLE_CALENDAR_PROJECT_ID', 'hrtelecoms'),
    'auth_uri' => env('GOOGLE_CALENDAR_AUTH_URI', 'https://accounts.google.com/o/oauth2/auth'),
    'token_uri' => env('GOOGLE_CALENDAR_TOKEN_URI', 'https://oauth2.googleapis.com/token'),
    'auth_provider_x509_cert_url' => env('GOOGLE_CALENDAR_AUTH_PROVIDER_CERT_URL', 'https://www.googleapis.com/oauth2/v1/certs'),
    
    /*
    |--------------------------------------------------------------------------
    | Google Calendar Settings
    |--------------------------------------------------------------------------
    */
    'calendar_id' => env('GOOGLE_CALENDAR_ID', 'primary'),
    
    /*
    |--------------------------------------------------------------------------
    | Access Token Storage
    |--------------------------------------------------------------------------
    | 
    | Specify where the access token should be stored.
    |
    */
    'token_file' => storage_path('app/google-calendar/token.json'),
];