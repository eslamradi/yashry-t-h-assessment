<?php

namespace Yashry\Cart;

use Yashry\Cart\Exceptions\CLI\ArgumentNameNotFoundException;
use Yashry\Cart\Exceptions\CLI\MultipleArgumentCountException;

class ParametersManager
{
    protected $parameters;
    protected $parametersRules;

    public function __construct()
    {
        $this->parametersRules = include('config/arguments.php');
    }

    public function set($key, $value)
    {
        if(array_key_exists($key, $this->parametersRules)){
            if (isset($this->parameters[$key])) {
                if($this->parametersRules[$key]['multiple']){
                    $this->parameters[$key][] = $value;
                } else {
                    throw new MultipleArgumentCountException;
                }
            } else {
                if($this->parametersRules[$key]['multiple']){
                    $this->parameters[$key] = [$value];
                } else {
                    $this->parameters[$key] = $value;
                }
            }
        }
    }

    public function get($key) {
        if(array_key_exists($key, $this->parametersRules)){
            if(isset($this->parameters[$key])){
                return $this->parameters[$key];
            }
            return false;
        } else {
            throw new ArgumentNameNotFoundException;
        }
    }
}
