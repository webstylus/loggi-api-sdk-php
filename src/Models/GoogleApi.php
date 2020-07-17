<?php

namespace Lojazone\Loggi\Models;

use Lojazone\Loggi\Client;

/**
 * Class GoogleApi
 * @package Lojazone\Loggi\Models
 */
class GoogleApi extends Client
{
    public $api_key;

    public function __construct($api_key)
    {
        $this->api_key = $api_key;
        parent::__construct();
    }

    public function getLatLong($postal_code)
    {
        $latLong = new LatitudeLongitude($this->getLocation($postal_code, $this->api_key));
        return $latLong->getValueLatLong() ?? false;
    }

    public function getFormattedAddress($postal_code)
    {
        $latLong = new LatitudeLongitude($this->getLocation($postal_code, $this->api_key));
        return $latLong->getValueFormattedAddress() ?? false;
    }
}