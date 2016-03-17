<?php

namespace Okta\Models\User;

class Password
{

    protected $password;

    public function password($password = null) {

        if (isset($password)) {
            $this->password = $password;
            return $this;
        }

        return $this->password;

    }


}
