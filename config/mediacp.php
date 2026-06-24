<?php

return [
    'base_url' => env('MEDIACP_BASE_URL'),

    'auth_type' => env('MEDIACP_AUTH_TYPE', 'bearer'),

    'token' => env('MEDIACP_TOKEN'),

    'api_key' => env('MEDIACP_API_KEY'),

    'api_key_header' => env('MEDIACP_API_KEY_HEADER', 'X-API-KEY'),

    'timeout' => (float) env('MEDIACP_TIMEOUT', 30),

    'verify' => env('MEDIACP_VERIFY_SSL', true),

    'headers' => [],
];
