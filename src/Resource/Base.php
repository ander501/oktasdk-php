<?php

namespace Okta\Resource;

use Okta;

/**
 * Okta resource base class. All Okta resources should extend this class.
 */
abstract class Base
{
    /** @var  object  Instance of GuzzleHttp\Client object */
    protected $client;

    /**
     * Okta\Resources\Base constructor method
     *
     * @param  object $client Instance of Okta\Client
     */
    public function __construct(Okta\Client $client)
    {
        $this->client = $client->instance();
    }

    /**
     * Process a GuzzleHttp response from the Okta API
     *
     * @param  $response  Guzzle response
     * @param  $assoc  Wether or not to return associative arrays
     *
     * @return object Decoded API response object
     */
    public function processResponse($response, $assoc = false)
    {
        if (! in_array($response->getStatusCode(), [200, 201, 202, 203, 204, 205, 206])) {
            throw new Okta\Exception(json_decode($response->getBody()));
        }

        return json_decode($response->getBody(), $assoc);
    }
}
