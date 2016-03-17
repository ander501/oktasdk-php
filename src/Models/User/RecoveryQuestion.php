<?php

namespace Okta\Models\User;

class RecoveryQuestion
{

    protected $question;
    protected $answer;

    public function question($question = null) {

        if (isset($question)) {
            $this->question = $question;
            return $this;
        }

        return $this->question;

    }

    public function answer($answer = null) {

        if (isset($answer)) {
            $this->answer = $answer;
            return $this;
        }

        return $this->answer;

    }

}
