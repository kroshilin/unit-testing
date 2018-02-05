<?php
/**
 * Created by PhpStorm.
 * User: kroshilin
 * Date: 05/02/2018
 * Time: 13:09
 */
namespace Calc\Observers;

interface ObserverInterface
{
    public function notify(string $eventName): bool;
}