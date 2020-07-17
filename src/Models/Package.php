<?php


namespace Lojazone\Loggi\Models;


/**
 * Class Package
 * @package Lojazone\Loggi\Models
 */
class Package extends Model
{
    /**
     * @param $shopId
     * @return mixed
     * @throws \Exception
     */
    public function listPackages($shopId)
    {
        $query = "query {
                      allPackages(shopId: $shopId) {
                        edges {
                          node {
                            pk
                            status
                            orderId
                            orderStatus
                          }
                        }
                      }
                    }";

        return $this->getClient()->request('shop', $query);
    }

    /**
     * @param $packId
     * @return mixed
     * @throws \Exception
     */
    public function historyOfPackage($packId)
    {
        $query = "query {
                  packageHistory(packageId: $packId) {
                    signatureUrl
                    signedByName
                    statuses {
                      status
                      statusDisplay
                      detailedStatusDisplay
                      statusCode
                      updated
                    }
                  }
                }";
        return $this->getClient()->request('shop', $query);
    }

    /**
     * @param $packId
     * @return mixed
     * @throws \Exception
     */
    public function statusPackage($packId)
    {
        $query = "query {
                      packageOrder(packageId:$packId) {
                        id
                        pk
                        status
                        packages {
                          pk
                          status
                          statusCode
                          statusCodeDisplay
                        }
                      }
                    }";
        return $this->getClient()->request('shop', $query);
    }
}