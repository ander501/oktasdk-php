<?php

namespace Okta\Models\User;

class RecoveryQuestion
{
    /** @var string Recovery question */
    public $question;

    /** @var string Recovery question answer */
    public $answer;

    public function __construct($question, $answer)
    {
        $this->qusetion = $question;
        $this->answer = $answer;
    }
}
