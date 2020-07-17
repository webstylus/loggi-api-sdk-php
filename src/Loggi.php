<?php

namespace Lojazone\Loggi;

use Lojazone\Loggi\Contracts\LoggiInterface;
use Lojazone\Loggi\Models\Authorization;
use Lojazone\Loggi\Models\City;
use Lojazone\Loggi\Models\Invoice;
use Lojazone\Loggi\Models\Package;
use Lojazone\Loggi\Models\Shop;

/**
 * Class Loggi
 * @package Lojazone\Loggi
 */
class Loggi extends Client implements LoggiInterface
{
    /**
     * Loggi constructor.
     * @param null $email
     * @param null $api_key
     */
    public function __construct($email = null, $api_key = null)
    {
        parent::__construct($email, $api_key);
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
     * @return mixed
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

    /**
     * @return Invoice
     */
    public function invoice(): Invoice
    {
        return new Invoice($this);
    }

}