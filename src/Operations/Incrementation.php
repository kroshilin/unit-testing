<?php
/**
 * Created by PhpStorm.
 * User: kroshilin
 * Date: 01/02/2018
 * Time: 22:21
 */
namespace Calc\Operations;

use Calc\Exceptions\ArgumentValidationException;

class Incrementation extends AbstractOperation
{
    public function run(): float
    {
        return ++$this->arguments[0];
    }

    public function validateArguments(): bool
    {
        if (count($this->arguments) !== 1) {
            throw new ArgumentValidationException('This operation accepts only one argument');
        }

        if (!is_int((int)$this->arguments[0])) {
            throw new ArgumentValidationException('First argument should be integer');
        }

        return true;
    }
}