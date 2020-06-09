<?php

namespace Loggi;

use Loggi\Contracts\LoggiInterface;
use Loggi\Models\Authorization;
use Loggi\Models\City;
use Loggi\Models\Invoice;
use Loggi\Models\Package;
use Loggi\Models\Shop;

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