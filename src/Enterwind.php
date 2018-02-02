<?php

namespace Novay\ApiSamarinda;

use GuzzleHttp\Client as HttpClient;

class Enterwind
{
    function __construct()
    {
        // 
    }

    public function httpClient($method, $url, $custom = false)
    {
        if($custom == true) {
            $url = config('api-samarinda.api_url') . '/' . config('api-samarinda.api_version');
        }

        $client = new HttpClient;
        if($custom == true) {
            $res = $client->request($method, $url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . config('api-samarinda.token'),
                    'Content-Type'  => 'application/json',
                    'Accept' => 'application/json'
                ]
            ]);
        }

        $res->getHeader('content-type');

        return response()->json(json_decode($res->getBody(), true));
    }

    public function forgetParams() 
    {
        return response()->json(['message' => 'Anda kurang parameters.']);
    }
}