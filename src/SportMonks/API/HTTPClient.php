<?php

namespace SportMonksAPI\Soccer;


use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\HandlerStack;
use SportMonksAPI\Soccer\Middleware\RetryHandler;
use SportMonksAPI\Soccer\Resources\Bookmakers;
use SportMonksAPI\Soccer\Resources\Continents;
use SportMonksAPI\Soccer\Resources\Countries;
use SportMonksAPI\Soccer\Resources\Fixtures;
use SportMonksAPI\Soccer\Resources\Head2Head;
use SportMonksAPI\Soccer\Resources\Highlights;
use SportMonksAPI\Soccer\Resources\Leagues;
use SportMonksAPI\Soccer\Resources\LiveScores;
use SportMonksAPI\Soccer\Resources\Players;
use SportMonksAPI\Soccer\Resources\Rounds;
use SportMonksAPI\Soccer\Resources\Seasons;
use SportMonksAPI\Soccer\Resources\Squad;
use SportMonksAPI\Soccer\Resources\Teams;
use SportMonksAPI\Soccer\Resources\Venues;
use SportMonksAPI\Soccer\Traits\Utility\InitTrait;
use SportMonksAPI\Soccer\Utilities\Auth;

/**
 * Class HTTPClient
 * @package SportMonksAPI\Soccer;
 *
 * @method Continents continents()
 * @method Countries countries()
 * @method Leagues leagues()
 * @method Seasons seasons()
 * @method Fixtures fixtures()
 * @method LiveScores liveScores()
 * @method Highlights highlights()
 * @method Teams teams()
 * @method Head2Head head2Head()
 * @method Venues venues()
 * @method Bookmakers bookmakers()
 * @method Players players()
 * @method Rounds rounds()
 * @method Squad squad()
 */
class HTTPClient extends HTTP
{
    use InitTrait;

    const API_VERSION = '2.0';

    const BASE_PATH = 'api';

    /**
     * @var array $headers
     */
    private $headers = [];

    /**
     * @var string
     */
    protected $apiBaseUrl;

    /**
     * @var string
     */
    protected $apiBasePath;

    /**
     * @var string $scheme
     */
    protected $scheme;
    /**
     * @var string $hostname
     */
    protected $hostname;
    /**
     * @var string $subDomain
     */
    protected $subDomain;
    /**
     * @var int $port
     */
    protected $port;

    /**
     * @var Auth $auth
     */
    protected $auth;

    /**
     * @var \GuzzleHttp\Client $guzzle
     */
    public $guzzle;

    /**
     * @param string $scheme
     * @param string $hostname
     * @param string $subDomain
     * @param int $port
     */
    public function __construct($scheme = 'https', $hostname = 'sportmonks.com', $subDomain = 'soccer', $port = 443)
    {
        $this->scheme = $scheme;
        $this->hostname = $hostname;
        $this->subDomain = $subDomain;
        $this->port = $port;

        $handler = HandlerStack::create();
        $handler->push(new RetryHandler(['retry_if' => function ($retries, $request, $response, $e) {
            return $e instanceof RequestException && strpos($e->getMessage(), 'ssl') !== false;
        }]), 'retry_handler');
        $this->guzzle = new \GuzzleHttp\Client(compact('handler'));

        if (empty($subDomain)) {
            $this->apiBaseUrl = "$scheme://$hostname:$port/";
        } else {
            $this->apiBaseUrl = "$scheme://$subDomain.$hostname:$port/";
        }
    }

    /**
     * @return array
     */
    public static function getValidEndpoints()
    {
        return [
            'continents' => Continents::class,
            'countries' => Countries::class,
            'leagues' => Leagues::class,
            'seasons' => Seasons::class,
            'fixtures' => Fixtures::class,
            'liveScores' => LiveScores::class,
            'highlights' =>Highlights::class,
            'teams' => Teams::class,
            'head2Head' => Head2Head::class,
            'venues' => Venues::class,
            'bookmakers' => Bookmakers::class,
            'players' => Players::class,
            'rounds' => Rounds::class,
            'squad' => Squad::class
        ];
    }

    /**
     * @return string
     */
    public function getApiBaseUrl()
    {
        return $this->apiBaseUrl;
    }

    /**
     * @return string | null
     */
    public function getApiBasePath()
    {
        if(is_null($this->apiBasePath)){
            $this->apiBasePath = self::BASE_PATH. '/';
        }

        return $this->apiBasePath. 'v'. self::API_VERSION. '/';
    }

    /**
     * @param string $apiBasePath
     */
    public function setApiBasePath($apiBasePath)
    {
        $this->apiBasePath = $apiBasePath;
    }

    /**
     * @return string
     */
    public function getUserAgent()
    {
        return 'SportMonksAPI/Mazraeshahi v'. self::API_VERSION;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param string $name
     * @param string $value
     */
    public function setHeader($name, $value)
    {
        $this->headers[$name] = $value;
    }

    /**
     * @return Auth
     */
    public function getAuth()
    {
        return $this->auth;
    }

    /**
     * Configure authentication method.
     *
     * @param $method
     * @param array $options
     *
     * @internal param Auth $auth
     */
    public function setAuth($method, array $options)
    {
        $this->auth = new Auth($method, $options);
    }

    /**
     * @param string $endpoint
     * @param array $queryParams
     *
     * @return \stdClass | null
     */
    public function get($endpoint, $queryParams = [])
    {
//        $sideloads = $this->getSideload($queryParams);
//
//        if (is_array($sideloads)) {
//            $queryParams['include'] = implode(',', $sideloads);
//            unset($queryParams['sideload']);
//        }

        $response = Http::send(
            $this,
            $endpoint,
            ['queryParams' => $queryParams]
        );

        return $response;
    }
}