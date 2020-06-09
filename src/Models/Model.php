<?php


namespace Loggi\Models;

/**
 * Class Model
 * @property string $response
 * @package Loggi\Models
 */
abstract class Model
{
    protected $response;

    /**
     * Model constructor.
     * @param $response
     */
    final public function __construct($response)
    {
        $this->response = $response;
    }

    /**
     * @param $name
     * @return mixed
     */
    final public function __get($name): ?object
    {
        return $this->$name;
    }
}