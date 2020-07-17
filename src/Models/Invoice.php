<?php


namespace Lojazone\Loggi\Models;


/**
 * Class Invoice
 * @package Lojazone\Loggi\Models
 */
class Invoice extends Model
{
    /**
     * @param $shopId
     * @param $lat
     * @param $long
     * @param $chargeMethod
     * @return mixed
     * @throws \Exception
     */
    public function
    estimatePricesUsingFixedOrderWithLatLong($shopId, $lat, $long, $chargeMethod)
    {
        $query = "query {
                      estimate(
                        shopId: $shopId,
                        packagesDestination: [
                          {
                            lat: $lat,
                            lng: $long   
                          }
                        ]
                        chargeMethod: $chargeMethod,
                        optimize: true
                      ) {
                        packages {
                          error
                          eta
                          index
                          rideCm
                          outOfCityCover
                          outOfCoverageArea
                          originalIndex
                          waypoint {
                            indexDisplay
                            originalIndexDisplay
                            role
                          }
                        }
                        routeOptimized
                        normal {
                          cost
                          distance
                          eta
                        }
                        optimized {
                          cost
                          distance
                          eta
                        }
                      }   
                    }";

        return $this->getClient()->request('shop', $query);
    }

    /**
     * @param $shopId
     * @param $trackingKey
     * @param $lat
     * @param $long
     * @param $address
     * @param $complement
     * @param $namePickUp
     * @param $phonePickup
     * @param $latPickup
     * @param $longPickup
     * @param $addressPickup
     * @param $complementPickup
     * @param $chargerValue
     * @param $chargeMethod
     * @param $changeValue
     * @param $width
     * @param $height
     * @param $length
     * @return mixed
     * @throws \Exception
     */
    public function createInvoice($shopId, $trackingKey, $lat, $long, $address, $complement,
                                  $namePickUp, $phonePickup, $latPickup, $longPickup,
                                  $addressPickup, $complementPickup,
                                  $chargerValue, $chargeMethod, $changeValue,
                                  $width, $height, $length)
    {
        $query = "mutation {
                      createOrder(input: {
                        shopId: $shopId
                        trackingKey: \"$trackingKey\"
                        pickups: [{
                          address: {
                            lat: $lat
                            lng: $long
                            address: \"$address\"
                            complement: \"$complement\"
                          }
                        }]
                        packages: [{
                          pickupIndex: 0
                          recipient: {
                            name: \"$namePickUp\"
                            phone: \"$phonePickup\"
                          }
                          address: {
                            lat: $latPickup
                            lng: $longPickup
                            address: \"$addressPickup\"
                            complement: \"$complementPickup\"
                          }
                          charge: {
                            value: \"$chargerValue\"
                            method: $chargeMethod
                            change: \"$changeValue\"
                          }
                          dimensions: {
                            width: $width
                            height: $height
                            length: $length
                          }
                        }]
                      }) {
                        success
                        shop {
                          pk
                          name
                        }
                        orders {
                          pk
                          trackingKey
                          packages {
                            pk
                            status
                            pickupWaypoint {
                              index
                              indexDisplay
                              eta
                              legDistance
                            }
                            waypoint {
                              index
                              indexDisplay
                              eta
                              legDistance
                            }
                          }
                        }
                        errors {
                          field
                          message
                        }
                      }
                    }";
        return $this->getClient()->request('shop', $query);
    }

    /**
     * @param $orderId
     * @return mixed
     * @throws \Exception
     */
    public function
    redoAnOrder($orderId)
    {
        $query = "mutation {
                      redoOrder(input: {id: $orderId}) {
                        success
                        order {
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
                      }
                    }";

        return $this->getClient()->request('shop', $query);
    }

    /**
     * @param $orderId
     * @return mixed
     * @throws \Exception
     */
    public function
    consultAnOrderAndTrackDeliveryPerson($orderId)
    {
        $query = "query {
                      retrieveOrderWithPk(orderPk: $orderId) {
                        status
                        statusDisplay
                        originalEta
                        totalTime
                        pricing {
                          totalCm
                        }
                        packages {
                          pk
                          shareds {
                            edges {
                              node {
                                trackingUrl
                              }
                            }
                          }
                        }
                        currentDriverPosition {
                          lat
                          lng
                          currentWaypointIndex
                          currentWaypointIndexDisplay
                        }
                      }
                    }";

        return $this->getClient()->request('shop', $query);
    }

    /**
     * @param $trackingKey
     * @return mixed
     * @throws \Exception
     */
    public function consultOrderbyTrackingKey($trackingKey)
    {
        $query = "query {
                      retrieveOrdersWithTrackingKey(trackingKey: \"$trackingKey\") {
                        status
                        statusDisplay
                        originalEta
                        totalTime
                        pricing {
                          totalCm
                        }
                            packages {
                          pk
                                shareds {
                                    edges {
                              
                                        node {
                                            trackingUrl
                                        }
                                    }
                                }
                            }
                        currentDriverPosition {
                          lat
                          lng
                          currentWaypointIndex
                          currentWaypointIndexDisplay
                        }
                      }
                    }";

        return $this->getClient()->request('shop', $query);
    }
}