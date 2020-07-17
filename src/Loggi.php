<?php

namespace Lojazone\Loggi;

use Lojazone\Loggi\Contracts\LoggiInterface;
use Lojazone\Loggi\Models\Authorization;
use Lojazone\Loggi\Models\City;
use Lojazone\Loggi\Models\GoogleApi;
use Lojazone\Loggi\Models\Invoice;
use Lojazone\Loggi\Models\Package;
use Lojazone\Loggi\Models\Shop;

/**
 * Class Loggi
 * @package Lojazone\Loggi
 */
class Loggi extends Client implements LoggiInterface
{
    private $google_api_key;

    /**
     * Loggi constructor.
     * @param null $email
     * @param null $api_key
     */
    public function __construct($google_api_key, $email = null, $api_key = null)
    {
        parent::__construct($email, $api_key);
        $this->google_api_key = $google_api_key;
    }

    /**
     * @return string|null
     */
    public function getApiKey(): ?string
    {
        return $this->api_key;
    }

    /**
     * @param string $email
     * @param string $password
     * @return string|null
     * @throws \Exception
     */
    public function getCredentials($email, $password): ?string
    {
        $query = 'mutation {login(input: {email: "' . $email . '",password: "' . $password . '"}) {user {apiKey}}}';
        $credentials = new Authorization($this->request('authorization', $query));
        $this->api_key = $credentials->getValue();
        return $this->api_key;
    }

    /**
     * @return Shop
     */
    public function shop(): Shop
    {
        return new Shop($this);
    }

    /**
     * @return City
     */
    public function city(): City
    {
        return new City($this);
    }

    /**
     * @return Package
     */
    public function package(): Package
    {
        return new Package($this);
    }

    public function estimate(string $postal_code): Invoice
    {
        $google = new GoogleApi($this->google_api_key);
        if ($location = $google->getLatLong($postal_code)) {
            $this->lat = $location['lat'];
            $this->long = $location['long'];
        }
        return new Invoice($this);
    }

    /**
     * @return Invoice
     */
    public function invoice(): Invoice
    {
        return new Invoice($this);
    }

}