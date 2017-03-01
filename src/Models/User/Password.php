<?php

namespace Okta\Models\User;

class Password
{
    /** @var string Password value */
    public $value;

    public function __construct($value)
    {
        $this->value = $value;
    }
}
