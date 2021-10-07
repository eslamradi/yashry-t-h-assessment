<?php

namespace Yashry\Cart\Validation\Rules;

use Yashry\Cart\Configs;
use Yashry\Cart\Exceptions\CLI\InvalidCommandArgument;
use Yashry\Cart\Validation\RuleInterface;

class ValidCommandName implements RuleInterface
{
    public function validate($value)
    {
        $configs = new Configs;
        $availableRules = $configs->getActions();
        return array_key_exists($value, $availableRules);
    }
}
