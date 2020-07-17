<?php

namespace Lojazone\Loggi\Models;

/**
 * Class Authorization
 * @package Loggi\Models
 */
class Authorization
{
    protected $response;

    /**
     * Model constructor.
     * @param $response
     */
    public function __construct($response)
    {
        $this->response = $response;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name): ?object
    {
        return $this->$name;
    }
    /**
     * Get apikey resumed
     * @return mixed
     */
    public function getValue(): string
    {
        return $this->response->data->login->user->apiKey;
    }
}