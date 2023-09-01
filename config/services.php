<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id'     => '548420885821-ekehnu5dc3mduuc6pm8rjip6pm7qnrtv.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect'      => 'https://dashboard.savvyhost.io/google/callback',
    ],

    'facebook' => [
        'client_id'     => '994206091897032',
        'client_secret' => '86089b2542560b6502f4901ef9dbec2c',
        // 'redirect'      => 'https://dashboard.savvyhost.io/facebook/callback',
        'redirect' => 'https://dashboard.savvyhost.io/api/login/facebook',
    ],

];