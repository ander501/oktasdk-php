<?php

namespace Okta\Resource;

/**
 * Implementation of the Okta Roles resource, access via $okta->role
 *
 * http://developer.okta.com/docs/api/resources/roles.html
 */
class Role extends Base
{
    /**
     * Lists all roles assigned to a user.
     *
     * @param  string  $uid ID of user
     *
     * @return array  Array of Roles
     */
    public function listRoles($uid)
    {
        $response = $this->client->get('users/' . $uid . '/roles');

        return $this->processResponse($response);
    }

    /**
     * Assigns a role to a user.
     *
     * @param  string  $uid  ID of user
     * @param  string  $type  Type of role to assign
     *
     * @return object  Assigned Role
     */
    public function assignRole($uid, $type)
    {
        $response = $this->client->post('users/' . $uid . '/roles', [
            'json' => ['type' => $type]
        ]);

        return $this->processResponse($response);
    }

    /**
     * Unassigns a role from a user.
     *
     * @param  string  $uid  ID of user
     * @param  string  $rid  ID of role
     *
     * @return empty  HTTP/1.1 204 No Content
     */
    public function unassignRole($uid, $rid)
    {
        $response = $this->client->delete('users/' . $uid . '/roles/' . $rid);

        return $this->processResponse($response);
    }

    /**
     * Lists all group targets for a USER_ADMIN role assignment.
     *
     * @param  string  $uid  ID of user
     * @param  string  $rid  ID of role
     * @param  int  $limit  Number of results for a page
     * @param  string  $after  Specifies the pagination cursor for the next page
     *                         of targets
     *
     * @return array  Array of Groups
     */
    public function listUserAdminGroupTargets($uid, $rid, $limit = null, $after = null)
    {
        $response = $this->client->get('users/' . $uid . '/roles/' . $rid . '/targets/groups', [
            'query' => [
                'limit' => $limit,
                'after' => $after
            ]
        ]);

        return $this->processResponse($response);
    }

    /**
     * Lists all app targets for an APP_ADMIN role assignment.
     *
     * @param  string  $uid  ID of user
     * @param  string  $rid  ID of role
     * @param  int  $limit  Number of results for a page
     * @param  string  $after  Specifies the pagination cursor for the next page
     *                       of targets
     *
     * @return array  Array of Catalog Apps
     */
    public function listAppAdminAppTargets($uid, $rid, $limit = null, $after = null)
    {
        $response = $this->client->get('users/' . $uid . '/roles/' . $rid . '/targets/catalog/apps', [
            'json' => [
                'limit' => $limit,
                'after' => $after
            ]
        ]);

        return $this->processResponse($response);
    }
}
