<?php

namespace Yashry\Cart\Validation;

use Yashry\Cart\Validation\RuleInterface;


class Validator
{

    public $rules;

    public function __construct()
    {
        $this->rules = [];
    }
    public function queue(RuleInterface $rule)
    {
        $this->rules[] = $rule;
    }
    public function reset()
    {
        $this->rules = [];
    }
    public function run()
    {
        foreach ($this->rules as $rule) {
            $rule = new $rule;
            $rule->validate();
        }
    }
}
