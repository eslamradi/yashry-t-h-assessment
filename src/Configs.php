<?php

namespace Yashry\Cart;

class Configs
{
    protected $configsDirectoryPath;
    
    public function __construct()
    {
        $this->configsDirectoryPath = 'config';
    }
    
    public function getActions()
    {
        $actions = include($this->configsDirectoryPath . '/actions.php');
        return $actions;
    }
}
