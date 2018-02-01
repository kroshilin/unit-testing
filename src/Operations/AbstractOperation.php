<?php
/**
 * Created by PhpStorm.
 * User: kroshilin
 * Date: 01/02/2018
 * Time: 22:17
 */
namespace Calc\Operations;

abstract class AbstractOperation implements OperationInterface
{
    protected $arguments = [];

    abstract public function run(): float;

    abstract public function validateArguments(): bool;

    public function getOperationCode(): string
    {
        $reflect = new \ReflectionClass($this);
        return $reflect->getShortName();
    }

    public function setArguments(array $args)
    {
        $this->arguments = $args;
    }
}