<?php
/**
 * Created by PhpStorm.
 * User: kroshilin
 * Date: 01/02/2018
 * Time: 22:12
 */
namespace Calc;

use Calc\Operations\OperationInterface;

class Calculator
{
    public function doOperation(OperationInterface $operation, string $args): float
    {
        $operation->setArguments(explode(',', $args));
        $operation->validateArguments();
        return $operation->run();
    }
}
