<?php

namespace Okta\Models\User;

use Okta\Models\User\Password;
use Okta\Models\User\Provider;
use Okta\Models\User\RecoveryQuestion;

class Credentials
{
    /** @var Password Password object */
    protected $password;

    /** @var RecoveryQuestion Recovery Question object */
    protected $recovery_question;

    /** @var Provider Provider object */
    protected $provider;

    public function __construct(Password $password, RecoveryQuestion $recoveryQuestion, Provider $provider)
    {
        $this->password = $password;
        $this->recovery_question = $recoveryQuestion;
        $this->provider = $provider;
    }
}
