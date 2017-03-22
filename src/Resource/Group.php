<?php

namespace Okta\Resource;

/**
 * Implementation of the Okta Groups resource, access via $okta->group
 *
 * http://developer.okta.com/docs/api/resources/groups.html
 */
class Group extends Base
{

    /**
     * Adds a new group with OKTA_GROUP type to your organization.
     *
     * @param  array  $profile  okta:user_group profile for a new group
     *
     * @return object  The created Group object
     */
    public function add(array $profile)
    {
        $response = $this->client->post('groups', [
            'json' => ['profile' => $profile]
        ]);

        return $this->processResponse($response);
    }

    /**
     * Fetches a specific group by id from your organization.
     *
     * @param  string  $gid  ID of a group
     *
     * @return object  Group object
     */
    public function get($gid)
    {
        $response = $this->client->get('groups/' . $gid);

        return $this->processResponse($response);
    }

    /**
     * Enumerates groups in your organization with pagination. A subset of
     * groups can be returned that match a supported filter expression or query.
     *
     * @param  array  $query  Array of query parameters/values
     *
     * @return array  Array of Group objects
     */
    public function listGroups(array $query = [])
    {
        $response = $this->client->get('groups', [
            'query' => $query
        ]);

        return $this->processResponse($response);
    }

    /**
     * Updates the profile for a group with OKTA_GROUP type from your
     * organization. Only profiles for groups with OKTA_GROUP type can be
     * modified.
     *
     * @param  string  $gid  ID of the group to update
     * @param  array  $profile  Updated profile for the group
     *
     * @return object  Updated Group
     */
    public function update($gid, array $profile)
    {
        $response = $this->client->put('groups/' . $gid, [
            'json' => ['profile' => $profile]
        ]);

        return $this->processResponse($response);
    }

    /**
     * Removes a group with OKTA_GROUP type from your organization. Only groups
     * with OKTA_GROUP type can be removed.
     *
     * @param  string  $gid  ID of the group to delete
     *
     * @return object  Empty object
     */
    public function remove($gid)
    {
        $response = $this->client->delete('groups/' . $gid);

        return $this->processResponse($response);
    }

    /**
     * Enumerates all users that are a member of a group.
     *
     * @param  string  $gid  ID of the group
     * @param  int  $limit  Specifies the number of user results in a page
     * @param  string  $after  Specifies the pagination cursor for the next page
     *                         of users
     *
     * @return array  Array of Users
     */
    public function listMembers($gid, $limit = null, $after = null)
    {
        $response = $this->client->get('groups/' . $gid . '/users', [
            'query' => [
                'limit' => $limit,
                'after' => $after
            ]
        ]);

        return $this->processResponse($response);
    }

    /**
     * Adds a user to a group with OKTA_GROUP type. Only memberships for groups
     * with OKTA_GROUP type can be modified.
     *
     * @param  string  $gid  ID of the group
     * @param  string  $uid  ID of the user
     *
     * @return object  Empty object
     */
    public function addUser($gid, $uid)
    {
        $response = $this->client->put('groups/' . $gid . '/users/' . $uid);

        return $this->processResponse($response);
    }

    /**
     * Removes a user from a group with OKTA_GROUP type. Only memberships for
     * groups with OKTA_GROUP type can be modified.
     *
     * @param  string  $gid  ID of the group
     * @param  string  $uid  ID of the user
     *
     * @return object  Empty object
     */
    public function removeUser($gid, $uid)
    {
        $response = $this->client->delete('groups/' . $gid . '/users/' . $uid);

        return $this->processResponse($response);
    }

    /**
     * Enumerates all applications that are assigned to a group. See Application
     * Group Operations
     *
     * @param  string  $gid  ID of the group
     * @param  int  $limit  Specifies the number of user results in a page
     * @param  string  $after  Specifies the pagination cursor for the next page
     *                         of users
     *
     * @return array  Array of Applications
     */
    public function listApps($gid, $limit = null, $after = null)
    {
        $response = $this->client->get('groups/' . $gid . '/apps', [
            'query' => [
                'limit' => $limit,
                'after' => $after
            ]
        ]);

        return $this->processResponse($response);
    }
}
