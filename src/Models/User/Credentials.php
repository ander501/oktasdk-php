<?php

namespace Okta\Models\User;

use Okta\Models\User\Password;
use Okta\Models\User\RecoveryQuestion;
use Okta\Models\User\Provider;

class Credentials
{

    protected $password = new Password();
    protected $recovery_question = new RecoveryQuestion();
    protected $provider = new Provider();

}
