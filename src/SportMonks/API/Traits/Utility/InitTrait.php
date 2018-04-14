<?php

namespace SportMonksAPI\Soccer\Traits\Utility;
use SportMonksAPI\Soccer\HTTPClient;
use SportMonksAPI\Soccer\Resources\ResourceAbstract;

/**
 * Trait InitTrait is used to provide magic method for initializing Resources
 *
 * @package SportMonksAPI\Soccer
 */
trait InitTrait
{
    /**
     * This method exposes a getter function with the same name as variable.
     * $client->continent can be referenced by $client->continent()
     *
     * @param $name
     * @param $arguments
     *
     * @return mixed
     * @throws \Exception
     */
    public function __call($name, $arguments)
    {
        if ((array_key_exists($name, $validSubResources = $this::getValidEndpoints()))) {
            $className = $validSubResources[$name];
            $client    = ($this instanceof HTTPClient) ? $this : $this->client;
            $class     = new $className($client);
        } else {
            throw new \Exception("Method $name does not exist " . __CLASS__);
        }

//        $chainedParams = ($this instanceof ResourceAbstract) ? $this->getChainedParameters() : [];
//
//        if ((isset($arguments[0])) && ($arguments[0] != null)) {
//            $chainedParams = array_merge($chainedParams, [get_class($class) => $arguments[0]]);
//        }
//
//        $class = $class->setChainedParameters($chainedParams);

        return $class;
    }
}