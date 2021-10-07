<?php

namespace Yashry\Cart\Actions;

use Yashry\Cart\Actions\ActionInterface;

class CreateCart implements ActionInterface
{

    public function run($options = [])
    {
        print 'OK 200.';
    }
}
