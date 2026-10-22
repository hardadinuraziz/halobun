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
    | Rekening Bank Transfer Resmi
    |--------------------------------------------------------------------------
    */
    'bank' => [
        'name'           => env('BANK_NAME', 'Bank Mandiri'),
        'account_number' => env('BANK_ACCOUNT_NUMBER', '1030012983454'),
        'account_name'   => env('BANK_ACCOUNT_NAME', 'CV SARANA HIJAU'),
    ],

    /*
    |--------------------------------------------------------------------------
    | App Settings & Admin WhatsApp Notification
    |--------------------------------------------------------------------------
    */
    'app_name'      => env('HALLOBUN_APP_NAME', 'Hallobun'),
    'admin_name'    => env('HALLOBUN_ADMIN_NAME', 'Amanda'),
    'admin_phone'   => env('HALLOBUN_ADMIN_PHONE', '085713850615'),
    'admin_email'   => env('HALLOBUN_ADMIN_EMAIL', 'admin@hallobun.com'),
];
