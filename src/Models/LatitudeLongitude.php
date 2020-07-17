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
     * @return bool
     */
    public function getValueLatLong()
    {
        if ($this->response) {
            $value['lat'] = $this->response->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
            $value['long'] = $this->response->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
            return $value;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function getValueFormattedAddress()
    {
        if ($this->response) return $this->response->{'results'}[0]->{'formatted_address'};
        return false;
    }
}