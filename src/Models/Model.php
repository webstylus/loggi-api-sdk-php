<?php


namespace Loggi\Models;

use Loggi\Client;

/**
 * Class Model
 * @property string $client
 * @package Loggi\Models
 */
abstract class Model
{
    protected $client;

    /**
     * Model constructor.
     * @param Client $client
     */
    final public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param $name
     * @return mixed
     */
    final public function __get($name): ?object
    {
        return $this->$name;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    public function queryType()
    {
        
    }
}