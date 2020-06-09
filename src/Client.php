<?php

namespace Loggi;

use GuzzleHttp\Exception\ClientException;

abstract class Client
{
    /** @var \GuzzleHttp\Client $client */
    protected $client;


    /** @var EndPoints $endpoint */
    protected $endpoint;


    /** @var */
    protected $api_key;


    /** @var */
    protected $email;


    /** @var array|string[] */
    private $header_authorization = [];


    /**
     * Client constructor.
     * @param null $email
     * @param null $api_key
     */
    public function __construct($email = null, $api_key = null)
    {
        $this->endpoint = new EndPoints();
        if (!is_null($api_key) && !is_null($email)) {
            $this->api_key = $api_key;
            $this->email = $email;
            $this->header_authorization = [
                'Authorization' => "ApiKey {$this->email}:{$this->api_key}"
            ];
        }
        $this->client = new \GuzzleHttp\Client([
            'headers' => [
                    'Content-Type' => 'application/json',
                ] + $this->header_authorization
        ]);
    }

    /**
     * @param $endpoint_name
     * @param $query
     * @return mixed
     * @throws \Exception
     */
    public function request($endpoint_name, $query)
    {
        try {
            $request = $this->client->post($this->endpoint->$endpoint_name, [
                'body' => json_encode(['query' => $query])
            ]);
            return \GuzzleHttp\json_decode($request->getBody());
        } catch (ClientException $clientException) {
            throw new \Exception($clientException->getMessage());
        }
    }


}