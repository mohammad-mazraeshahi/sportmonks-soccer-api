<?php

namespace SportMonksAPI\Soccer;

use Illuminate\Support\ServiceProvider;

class SportMonksSoccerApiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('SportMonksSoccerApi', function () {
            return new SportMonksSoccerApi;
        });

        $this->mergeConfigFrom(__DIR__.'/config/main.php' , 'main');
    }
}