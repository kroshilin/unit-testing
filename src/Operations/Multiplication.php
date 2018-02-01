<?php
/**
 * Created by PhpStorm.
 * User: kroshilin
 * Date: 01/02/2018
 * Time: 22:21
 */
namespace Calc\Operations;

use Calc\Exceptions\ArgumentValidationException;

class Multiplication extends AbstractOperation
{
    public function run(): float
    {
        return $this->arguments[0] * $this->arguments[1];
    }

    public function validateArguments(): bool
    {
        if (count($this->arguments) !== 2) {
            throw new ArgumentValidationException('This operation accepts exactly 2 arguments');
        }

        if (!is_numeric($this->arguments[0]) || !is_numeric($this->arguments[1])) {
            throw new ArgumentValidationException('Both arguments should be numbers');
        }

        return true;
    }
}