<?php
/**
 * Created by PhpStorm.
 * User: kroshilin
 * Date: 04/02/2018
 * Time: 13:20
 */

namespace CalcTest\Operations;

use Calc\Operations\Incrementation;
use PHPUnit\Framework\TestCase;

class IncrementTest extends TestCase
{
    public function testOperationResult()
    {
        $operation = new Incrementation();
        $operation->setArguments([5]);
        $result = $operation->run();
        $this->assertEquals(6, $result);
    }
}