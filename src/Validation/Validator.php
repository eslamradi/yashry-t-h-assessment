<?php

namespace Yashry\Cart\Validation;

use Yashry\Cart\Validation\RuleInterface;


class Validator
{

    protected $rules;

    public function __construct()
    {
        $this->rules = [];
    }
    public function queue($rule)
    {
        $this->rules[] = $rule;
    }
    public function reset()
    {
        $this->rules = [];
    }
    public function runOn($value)
    {
        foreach ($this->rules as $rule) {
            $rule = new $rule;
            if( ! $rule->validate($value)){
                return false;
            }
        }
        return true;
    }
}
