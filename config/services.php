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
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    // 'facebook' => [
    //     'client_id'     => env('FACEBOOK_CLIENT_ID','641405626794335'),
    //     'client_secret' => env('FACEBOOK_CLIENT_SECRET','d6827782d22b724351fca61b95f98bd5'),
    //     'redirect'      => env('APP_URL') . 'login/facebook/callback',
    // ],

    // 'google' => [
    //     'client_id'     => env('GOOGLE_CLIENT_ID','398591407247-hptnafe2toehe26eg75te87qt5q72an5.apps.googleusercontent.com'),
    //     'client_secret' => env('GOOGLE_CLIENT_SECRET','gVCRaoULMqDM37hrGD0ka_xg'),
    //     'redirect'      => env('APP_URL') . ':8080/auth/google/callback',
    // ],

    'facebook' => [
        'client_id' => '1667757613378681',
        'client_secret' => '5f6e4f2c0b20c2cb6d92a799180d1ad4',
        'redirect' => 'http://127.0.0.1:8000/login/facebook/callback',
    ],

	'google' => [
        'client_id' => '398591407247-hptnafe2toehe26eg75te87qt5q72an5.apps.googleusercontent.com',
        'client_secret' => 'gVCRaoULMqDM37hrGD0ka_xg',
        'redirect' => 'http://127.0.0.1:8000/auth/google/callback',
    ],

];
