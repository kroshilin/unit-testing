<?php
/**
 * Created by PhpStorm.
 * User: kroshilin
 * Date: 01/02/2018
 * Time: 22:12
 */
namespace Calc;

use Calc\Observers\ObserverInterface;
use Calc\Operations\OperationInterface;

class Calculator
{
    protected $observers = [];

    public function addObserver(ObserverInterface $observer)
    {
        $this->observers[] = $observer;
    }

    public function doOperation(OperationInterface $operation, string $args): float
    {
        $operation->setArguments(explode(',', $args));
        $operation->validateArguments();
        $result = $operation->run();
        $this->observe($operation);
        return $result;
    }

    protected function observe(OperationInterface $operation)
    {
        foreach ($this->observers as $observer) {
            $observer->notify($operation->getOperationCode());
        }
    }
}
