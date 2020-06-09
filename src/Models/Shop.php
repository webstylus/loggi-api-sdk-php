<?php


namespace Lojazone\Loggi\Models;

/**
 * @property string $name
 * @property string $addressCep
 * @property string $addressNumber
 * @property string $addressComplement
 * @property string $phone
 * @property integer $companyId
 * @property string $pickupInstructions
 * @property integer $numberOfRadialZones
 * @property string $externalId
 * @property string $productVersion
 * @property string $pk
 * @property string $Address
 * @property string $chargeOptions
 * @property string $label
 * Class Shop
 * @package Loggi\Models
 */
class Shop extends Model
{
    public $name;
    public $addressCep;
    public $addressNumber;
    public $addressComplement;
    public $phone;
    public $companyId;
    public $pickupInstructions;
    public $numberOfRadialZones;
    public $externalId;
    public $productVersion;
    public $pk;
    public $Address;
    public $chargeOptions;
    public $label;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getShopList()
    {
        $query = 'query{allShops{edges{node{name pickupInstructions pk address{pos addressSt addressData}chargeOptions{label}}}}}';
        return $this->getClient()->request('shop', $query);
    }

    public function createShop(
        $name, $addressCep, $addressNumber, $addressComplement, $phone, int $companyId, $pickupInstructions,
        int $numberOfRadialZones, $externalId, $productVersion
    )
    {
        $query = 'mutation {
                    createShop (input: {
                        name: "' . $name . '",
                        addressCep: "' . $addressCep . '",
                        addressNumber: "' . $addressNumber . '",
                        addressComplement: "' . $addressComplement . '",
                        phone: "' . $phone . '",
                        companyId: ' . $companyId . ',
                        pickupInstructions: "' . $pickupInstructions . '",
                        numberOfRadialZones: ' . $numberOfRadialZones . ',
                        externalId: "' . $externalId . '"
                        productVersion: ' . $productVersion . '
                
                    }) {
                        shop {
                            pk
                            name
                            address {
                                    label
                            }
                        pickupInstructions
                        }
                    }
                }';
        return $this->getClient()->request('shop', $query);
    }

}