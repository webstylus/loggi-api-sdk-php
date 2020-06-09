<?php


namespace Lojazone\Loggi;

/**
 * Class EndPoints
 * @property string $authorization
 * @property string $shop
 *
 * @package Loggi
 */
class EndPoints
{
    public const SANDBOX = 'https://staging.loggi.com/graphql';
    public const PRODUCTION = 'https://www.loggi.com/graphql';

    private $endpoints;

    public function __construct()
    {
        $this->endpoints = [
            'authorization' => 'https://staging.loggi.com/graphql',
            'shop' => 'https://staging.loggi.com/graphql/?='
        ];
    }

    /**
     * @param $name
     * @return string
     */
    public function __get($name)
    {
        return $this->endpoints[$name];
    }

}