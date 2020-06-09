<?php

namespace Loggi;

use Loggi\Contracts\LoggiInterface;
use Loggi\Models\Authorization;

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

}