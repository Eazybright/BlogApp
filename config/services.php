<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => 'sandbox846b7f0a13d741df9b5c1df944b25d6a.mailgun.org',
        'secret' => '96911713a85fe1698f2df0d6683676ae-b0aac6d0-0774b251',
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'sendgrid' => [
        'api_key' => env('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'),
    ],

    'facebook' => [
        'client_id' => '303004613826656',
        'client_secret' => 'a3615c834ed00fea0b91a04e8c49c558',
        'redirect' => 'https://eazyblog.herokuapp.com/redirect',
      ],

];
