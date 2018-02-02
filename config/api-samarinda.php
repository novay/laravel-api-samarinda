<?php

return [

    /*
    |--------------------------------------------------------------------------
    | URL Samarinda API
    |--------------------------------------------------------------------------
    |
    | Berisi URL Resmi dari Samarinda API
    |
    */
    'api_url' => env('SMR_API', 'http://api.samarindakota.go.id/api'), 

    /*
    |--------------------------------------------------------------------------
    | API Version
    |--------------------------------------------------------------------------
    |
    | API Version yang digunakan
    |
    */
    'api_version' => env('SMR_API_VERSION', 'v1'), 

    /*
    |--------------------------------------------------------------------------
    | Samarinda API Token
    |--------------------------------------------------------------------------
    |
    | Dapatkan Token API melalui website http://api.samarindakota.go.id dengan
    | cara mendaftarkan diri Anda terlebih dahulu.
    | Terima kasih.
    |
    */
    'token' => env('SMR_TOKEN', ''), 

];