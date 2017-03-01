<?php

namespace Okta\Models;

use Okta\Models\User\Credentials;
use Okta\Models\User\Profile;

class User
{
    /** @var string Unique key for user */
    public $id;

    /** @var string Current status of user */
    public $status;

    /** @var string Timestamp when user was created */
    public $created;

    /** @var string Timestamp when transition to ACTIVE status completed */
    public $activated;

    /** @var string Timestamp when status last changed */
    public $statusChanged;

    /** @var string Timestamp of last login */
    public $lastLogin;

    /** @var string Timestamp when user was last updated */
    public $lastUpdated;

    /** @var string Timestamp when password last changed */
    public $passwordChanged;

    /** @var string Target status of an in-progress asynchronous status transition */
    public $transitioningToStatus;

    /** @var Profile User profile properties */
    public $profile;

    /** @var Credentials user’s primary authentication and recovery credentials */
    public $credentials;

    public function __construct($id, $status, $created, $activated, $statusChanged, $lastLogin, $lastUpdated, $passwordChanged, Profile $profile, Credentials $credentials)
    {
        $this->id = $id;
        $this->status = $status;
        $this->created = $created;
        $this->activated = $activated;
        $this->statusChanged = $statusChanged;
        $this->lastLogin = $lastLogin;
        $this->lastUpdated = $lastUpdated;
        $this->passwordChanged = $passwordChanged;
        $this->profile = $profile;
        $this->credentials = $credentials;
    }
}
