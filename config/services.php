<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost, Postmark, AWS and more. This file provides the de facto
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

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\Models\Auth\User::class,
        // 'key' => env('STRIPE_KEY', 'pk_live_ut3XHkZWlA0NgeL5yQAmHSTz'),
        // 'secret' => env('STRIPE_SECRET', 'sk_live_RDmE4YBpXydnqJsFhjU4RQgN00nzPZuaWh'),
        // 'key' => env('STRIPE_KEY', 'pk_test_rdcdd1KeaVgiywKV3hor8t8Z'),
        // 'secret' => env('STRIPE_SECRET', 'sk_test_u14mJq0oi4DZeC3X9uwhk4cu'),
        'key' => env('STRIPE_KEY', 'pk_test_xehWiOnlgbdoVvhiFV5RkxMv'),
        'secret' => env('STRIPE_SECRET', 'sk_test_vVrWMlThYpOGe0HQoaoyxydQ'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    /*
     * Socialite Credentials
     * Redirect URL's need to be the same as specified on each network you set up this application on
     * as well as conform to the route:
     * http://localhost/public/login/SERVICE/callback
     * Where service can github, facebook, twitter, google, linkedin, or bitbucket
     * Docs: https://github.com/laravel/socialite
     */

    'facebook' => [
        'active' => env('FACEBOOK_ACTIVE', false),
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => env('FACEBOOK_REDIRECT'),
    ],

    'google' => [
        'active' => env('GOOGLE_ACTIVE', false),
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT'),
    ],

    'linkedin' => [
        'active' => env('LINKEDIN_ACTIVE', false),
        'client_id' => env('LINKEDIN_CLIENT_ID'),
        'client_secret' => env('LINKEDIN_CLIENT_SECRET'),
        'redirect' => env('LINKEDIN_REDIRECT'),
    ],
    
    'bitbucket' => [
        'active' => env('BITBUCKET_ACTIVE', false),
        'client_id' => env('BITBUCKET_CLIENT_ID'),
        'client_secret' => env('BITBUCKET_CLIENT_SECRET'),
        'redirect' => env('BITBUCKET_REDIRECT'),
    ],

    'github' => [
        'active' => env('GITHUB_ACTIVE', false),
        'client_id' => env('GITHUB_CLIENT_ID'),
        'client_secret' => env('GITHUB_CLIENT_SECRET'),
        'redirect' => env('GITHUB_REDIRECT'),
    ],

    'twitter' => [
        'active' => env('TWITTER_ACTIVE', false),
        'client_id' => env('TWITTER_CLIENT_ID'),
        'client_secret' => env('TWITTER_CLIENT_SECRET'),
        'redirect' => env('TWITTER_REDIRECT'),
    ],
];
