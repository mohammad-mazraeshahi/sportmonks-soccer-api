<?php

/**
 * @return SportMonksAPI\Soccer\SportMonksSoccerApi
*/
if (!function_exists('sportMonks')) {
    function sportMonks()
    {
        $client = new SportMonksAPI\Soccer\SportMonksSoccerApi();
        return   $client->get();
    }
}