<?php

namespace SportMonksAPI\Soccer;


use Illuminate\Support\Facades\Facade;

class APIFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SportMonksSoccerApi';
    }
}