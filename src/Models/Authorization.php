<?php

namespace Loggi\Models;

/**
 * Class Authorization
 * @package Loggi\Models
 */
class Authorization extends Model
{
    /**
     * Get apikey resumed
     * @return mixed
     */
    public function getValue(): string
    {
        return $this->response->data->login->user->apiKey;
    }
}