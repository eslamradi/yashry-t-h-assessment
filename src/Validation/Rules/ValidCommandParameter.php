<?php

namespace Yashry\Cart\Validation\Rules;

use Yashry\Cart\Exceptions\CLI\InvalidCommandArgument;
use Yashry\Cart\Validation\RuleInterface;

class ValidCommandParameter implements RuleInterface
{
    public function validate($value)
    {
        if (! preg_match("/--[a-zA-Z_-]*=[a-zA-Z0-9_-]*/", $value)) {
            return false;
        }
        return true;
    }
}
