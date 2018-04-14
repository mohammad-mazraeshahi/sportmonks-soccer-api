<?php

namespace SportMonksAPI\Soccer;

use SportMonksAPI\Soccer\HTTPClient;
use SportMonksAPI\Soccer\Utilities\Auth;

class SportMonksSoccerApi
{
    public function get()
    {
        $scheme = config('sportMonks.scheme');
        $hostname = config('sportMonks.hostname');
        $subDomain = config('sportMonks.subDomain');
        $port = config('sportMonks.port');
        $token = config('sportMonks.token');

        $client = new HTTPClient($scheme,$hostname,$subDomain,$port);
        $client->setAuth(Auth::BASIC, [
            'token' => $token
        ]);

        return $client;
    }
}