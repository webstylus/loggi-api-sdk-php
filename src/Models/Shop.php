<?php


namespace Loggi\Models;


use Loggi\Client;

/**
 * Class Shop
 * @package Loggi\Models
 */
class Shop extends Client
{
    public function get()
    {
        $query = 'query{allShops{edges{node{name pickupInstructions pk address{pos addressSt addressData}chargeOptions{label}}}}}';
        return $this->request('shop', $query);
    }
}