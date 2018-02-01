<?php
/**
 * Created by PhpStorm.
 * User: kroshilin
 * Date: 01/02/2018
 * Time: 22:14
 */
namespace Calc\Operations;

interface OperationInterface
{
    public function getOperationCode(): string;
    public function run(): float;
    public function setArguments(array $args);
    public function validateArguments(): bool;
}