<?php

namespace Yashry\Cart\Parsers;

use Yashry\Cart\Exceptions\CLI\InvalidCommandArgumentException;
use Yashry\Cart\Exceptions\CLI\InvalidCommandNameException;
use Yashry\Cart\Exceptions\CLI\NoCommandGivenException;
use Yashry\Cart\ParametersManager;
use Yashry\Cart\Validation\Rules\ValidCommandName;
use Yashry\Cart\Validation\Rules\ValidCommandParameter;
use Yashry\Cart\Validation\Validator;

class CommandLineParser
{
    /**
     * Undocumented function
     *
     * @param [type] $argumentCount
     * @param [type] $argumentValues
     * @throws Exception
     * @return void
     */

    public function parse($argumentCount, $argumentValues)
    {
        $command = '';
        $parameters = new ParametersManager;
        if ($argumentCount < 1) {
            throw new NoCommandGivenException;
        }

        $command = $argumentValues[1];
        $validator = new Validator();
        $validator->queue(ValidCommandName::class);
        if (! $validator->runOn($command)) {
            throw new InvalidCommandNameException;
        }
        $validator->reset();

        for ($i = 2; $i < $argumentCount; $i++) {

            $argumentLine = $argumentValues[$i];
            
            $validator->queue(ValidCommandParameter::class);;
            if (!$validator->runOn($argumentLine)) {
                throw new InvalidCommandArgumentException;
            }

            $cleanArgumentLine = substr($argumentLine, 2);
            list($parameter, $value) = explode('=', $cleanArgumentLine);
            $parameters->set($parameter, $value);
        }

        return [
            $command,
            $parameters
        ];
    }
}
