<?php

namespace Okta\Models;

use Okta\Models\User\Profile;
use Okta\Models\User\Credentials;

class User
{

    protected $id;
    protected $status;
    protected $created;
    protected $activated;
    protected $statusChanged;
    protected $lastLogin;
    protected $lastUpdated;
    protected $passwordChanged;
    protected $profile = new Profile();
    protected $credentials = new Credentials();

}
