<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['*', '/*', 'api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

//    'allowed_origins' => ['*'],
//
//    'allowed_origins_patterns' => [],

// explicitly tell which origins needs access to the resource
    'allowed_origins' => ['*', 'https://front.monshaa-crm.com/'],

// or use regex pattern, helpful if you want to grant
// access to origins with certain pattern (i.e. an origin under a subdomain etc.)
    'allowed_origins_patterns' => ['/https?:\/\/front.monshaa-crm\.com\/?\z/'],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
