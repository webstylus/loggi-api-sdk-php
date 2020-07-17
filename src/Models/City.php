<?php


namespace Lojazone\Loggi\Models;


/**
 * Class City
 * @package Lojazone\Loggi\Models
 */
class City extends Model
{
    /**
     * @return mixed
     * @throws \Exception
     */
    public function getCityList()
    {
        $query = 'query {
                      allCities {
                        edges {
                          node {
                            pk
                            name
                            slug
                          }
                        }
                      }
                    }';

        return $this->getClient()->request('shop', $query);
    }
}