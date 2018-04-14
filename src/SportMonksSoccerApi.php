<?php

namespace SportMonksAPI\Soccer;

use SportMonksAPI\Soccer\HTTPClient;
use SportMonksAPI\Soccer\Utilities\Auth;

class SportMonksSoccerApi
{
    public function get()
    {
        $scheme = config('main.scheme');
        $hostname = config('main.hostname');
        $subDomain = config('main.subDomain');
        $port = config('main.port');
        $token = config('main.token');

        $client = new HTTPClient($scheme,$hostname,$subDomain,$port);
        $client->setAuth(Auth::BASIC, [
            'token' => $token
        ]);

        return $client;
    }
}