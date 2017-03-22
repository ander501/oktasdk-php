<?php

namespace Okta;

use GuzzleHttp\Client as GuzzleClient;

/**
 * Okta\Client class
 *
 * @author Chris Kankiewicz <ckankiewicz@io.com>
 */
class Client
{
    /** @var object Instance of GuzzleHttp\Client object */
    public $client;

    /**
     * Okta\Client constructor method
     *
     * @param  string  $org  Your organization's subdomain (tenant)
     * @param  string  $key  Your Okta API key
     * @param  array  $config  Array of Client config key/values
     */
    public function __construct($org, $key, array $config = [])
    {
        $config = array_merge([
            'apiVersion' => 'v1',
            'bootstrap' => true,
            'headers' => [],
            'preview' => false
        ], $config);

        $domain = $config['preview'] ? 'oktapreview.com' : 'okta.com';

        $this->client = new GuzzleClient([
            'base_uri' => 'https://' . $org . '.' . $domain . '/api/' . $config['apiVersion'] . '/',
            'exceptions' => false,
            'headers' => array_merge([
                'Authorization' => 'SSWS ' . $key,
                'Content-Type' => 'application/json'
            ], $config['headers'])
        ]);

        if ($config['bootstrap']) $this->bootstrap();
    }

    /**
     * Bootstraps all Okta\Resources for easy access
     *
     * @return  object  This Okta\Client object
     */
    protected function bootstrap()
    {
        $this->app = new Resource\App($this);
        $this->auth = new Resource\Authentication($this);
        $this->event = new Resource\Event($this);
        $this->factor = new Resource\Factor($this);
        $this->group = new Resource\Group($this);
        $this->role = new Resource\Role($this);
        $this->schema = new Resource\Schema($this);
        $this->session = new Resource\Session($this);
        $this->user = new Resource\User($this);

        return $this;
    }

    /**
     * Return $this->client property
     *
     * @return  GuzzleClient  GuzzleHttp\Client object
     */
    public function instance()
    {
        return $this->client;
    }
}
