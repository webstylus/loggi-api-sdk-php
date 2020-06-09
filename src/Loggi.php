<?php

namespace Lojazone\Loggi;

use Lojazone\Loggi\Contracts\LoggiInterface;
use Lojazone\Loggi\Models\Authorization;
use Lojazone\Loggi\Models\City;
use Lojazone\Loggi\Models\Invoice;
use Lojazone\Loggi\Models\Package;
use Lojazone\Loggi\Models\Shop;

class Loggi extends Client implements LoggiInterface
{
    public function __construct($email = null, $api_key = null)
    {
        parent::__construct($email, $api_key);
    }

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

    public function shop(): Shop
    {
        return new Shop($this);
    }

    public function city(): City
    {
    }

    public function package(): Package
    {
    }

    public function invoice(): Invoice
    {
    }

}