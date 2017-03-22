<?php

namespace Okta\Resource;

/**
 * Implementation of the Okta Schemas resource, access via $okta->schema
 *
 * http://developer.okta.com/docs/api/resources/schemas.html
 */
class Schema extends Base
{
    /**
     * Fetches the default schema for a User
     *
     * @return  object  User Schema
     */
    public function getUser()
    {
        $response = $this->client->get('meta/schemas/user/default');

        return $this->processResponse($response);
    }

    /**
     * Adds, updates or removes one or more custom user profile properties to
     * the user schema or updates a permission for a user profile base property.
     *
     * Properties must be explicitly set to null to be removed from schema,
     * otherwise the POST will be interpreted as a partial update.
     *
     * @param  array  $definitions  Array of subschema properties with one or
     *                              more custom profile properties
     *
     * @return obeject  User Schema
     */
    public function userProperty(array $definitions)
    {
        $response = $this->client->post('meta/schemas/user/default', [
            'json' => ['definitions' => $definitions]
        ]);

        return $this->processResponse($response);
    }
}
