<?php

namespace Okta\Models\User;

use Exception;

class Provider
{

    protected $type;
    protected $name;

    public function type($type = null) {

        if (isset($type)) {

            if (!in_array($type, ['OKTA', 'ACTIVE_DIRECTORY','LDAP', 'FEDERATION', 'SOCIAL'])) {
                throw new Exception('Invalid type supplied');
            }

            $this->type = $type;
            return $this;
        }

        return $this->type;

    }

    public function name($name = null) {

        if (isset($name)) {
            $this->name = $name;
            return $this;
        }

        return $this->name;

    }

}
