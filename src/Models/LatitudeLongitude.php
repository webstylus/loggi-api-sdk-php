<?php

namespace Lojazone\Loggi\Models;

/**
 * Class Authorization
 * @package Loggi\Models
 */
class LatitudeLongitude
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
     * Get Latitude Longitude
     * @return mixed
     */
    public function getValueLatLong(): array
    {
        $value['lat'] = $this->response->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
        $value['long'] = $this->response->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
        return $value;
    }

    /**
     * Get Address
     * @return string
     */
    public function getValueFormattedAddress(): string
    {
        return $this->response->{'results'}[0]->{'formatted_address'};
    }
}