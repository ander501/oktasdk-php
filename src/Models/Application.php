<?php

namespace Okta\Models;

class Application
{
    /** @var [type] [description] */
    public $id;

    /** @var [type] [description] */
    public $name;

    /** @var [type] [description] */
    public $label;

    /** @var [type] [description] */
    public $created;

    /** @var [type] [description] */
    public $lastUpdated;

    /** @var [type] [description] */
    public $status;

    /** @var [type] [description] */
    public $features;

    /** @var [type] [description] */
    public $signOnMode;

    /** @var [type] [description] */
    public $accessibility;

    /** @var [type] [description] */
    public $visibility;

    /** @var [type] [description] */
    public $credentials;

    /** @var [type] [description] */
    public $settings;

    function __construct()
    {
        // ...
    }
}