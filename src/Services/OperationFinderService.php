<?php
/**
 * Created by PhpStorm.
 * User: kroshilin
 * Date: 02/02/2018
 * Time: 00:38
 */
namespace Calc\Services;

use Calc\Exceptions\OperationNotSupportedException;

class OperationFinderService
{
    public function findOperation(string $name)
    {
        try {
            $operationClass = 'Calc\\Operations\\' . ucfirst($name);
            $operation = new $operationClass;
        } catch (\Exception $e) {
            throw new OperationNotSupportedException();
        }

        return $operation;
    }
}