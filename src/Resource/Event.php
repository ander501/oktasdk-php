<?php

namespace Okta\Resource;

/**
 * Implementation of the Okta Events resource, access via $okta->event
 *
 * http://developer.okta.com/docs/api/resources/events.html
 */
class Event extends Base
{
    /**
     * Fetch a list of events from your Okta organization system log
     *
     * @param  array  $query  Array of query parameters/values
     *
     * @return  array  Array of Events
     */
    public function listEvents(array $query = [])
    {
        $response = $this->client->get('events', [
            'query' => $query
        ]);

        return $this->processResponse($response);
    }
}
