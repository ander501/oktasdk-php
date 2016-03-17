<?php

namespace Okta\Resources;

use GuzzleHttp\Client as GuzzleClient;
use Okta\Request as OktaRequest;

/**
 * Okta resource base class.  All Okta resources should extend this class.
 */
abstract class Base
{

    /**
     * @var object Okta\Request object
     */
    protected $request;

    /**
     * Okta\Resources\Base constructor method
     *
     * @param object $request  Instance of GuzzleClient
     */
    public function __construct(OktaRequest $request) {
        $this->request = $request;
    }

}
