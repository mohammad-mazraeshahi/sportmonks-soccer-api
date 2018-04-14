[![Build Status](https://travis-ci.org/hristonev/sportmonks-client-bundle.svg?branch=master)](https://travis-ci.org/hristonev/sportmonks-client-bundle)  SportMonks Soccer API
=============================


## API Version support

This API Client supports SportMonks v2.0.

## Requirements

- PHP 7.0 or higher

### Installation

`composer require mohammad-mazraeshahi/sportmonks-soccer-api`

## Configuration

``` php
// Bootstrap
require 'vendor/autoload.php';

use SportMonks\API\HTTPClient as SportMonksAPI;
use SportMonks\API\Utilities\Auth;

// Default values. Can be initialized without arguments.
$scheme = 'https';
$hostname = 'sportmonks.com';
$subDomain = 'soccer';
$port = 443;

// Auth.
$token = 'open sesame';

$client = new SportMonksAPI();
// or
//$client = new SportMonksAPI($scheme, $hostname, $subDomain, $port);

// Set auth.
$client->setAuth(Auth::BASIC, [
    'token' => $token
]);
```

## Config

In your `config/app.php` add `'SportMonksAPI\Soccer\SportMonksSoccerApiServiceProvider'` to the end of the `$providers` array

```php
'providers' => [

    Illuminate\Foundation\Providers\ArtisanServiceProvider::class,
    Illuminate\Auth\AuthServiceProvider::class,
    ...
    SportMonksAPI\Soccer\SportMonksSoccerApiServiceProvider::class,

],


'alias' => [
    ...
    'SportMonksSoccerApi' => SportMonksAPI\Soccer\APIFacade::class,
]
```

And add Token in config/main.php in vendor