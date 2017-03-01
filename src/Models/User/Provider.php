<?php

namespace Okta\Models\User;

use Exception;

class Provider
{
    /** @var string Provider type */
    public $type;

    /** @var string Provider name */
    public $name;

    public function __construct($type, $name)
    {
        $this->type = $type;
        $this->name = $name;
    }
}
