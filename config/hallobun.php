<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Midtrans Configuration
    |--------------------------------------------------------------------------
    */
    'server_key'    => env('MIDTRANS_SERVER_KEY', ''),
    'client_key'    => env('MIDTRANS_CLIENT_KEY', ''),
    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),
    'is_sanitized'  => true,
    'is_3ds'        => true,

    /*
    |--------------------------------------------------------------------------
    | Jitsi Meet Configuration
    |--------------------------------------------------------------------------
    */
    'jitsi_domain'  => env('JITSI_DOMAIN', 'meet.jit.si'),

    /*
    |--------------------------------------------------------------------------
    | Fonnte WhatsApp API
    |--------------------------------------------------------------------------
    */
    'fonnte_token'  => env('FONNTE_TOKEN', ''),

    /*
    |--------------------------------------------------------------------------
    | App Settings
    |--------------------------------------------------------------------------
    */
    'app_name'      => env('HALLOBUN_APP_NAME', 'Hallobun'),
    'admin_phone'   => env('HALLOBUN_ADMIN_PHONE', ''),
    'admin_email'   => env('HALLOBUN_ADMIN_EMAIL', 'admin@hallobun.com'),
];
