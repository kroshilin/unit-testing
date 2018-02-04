<?php
/**
 * Created by PhpStorm.
 * User: kroshilin
 * Date: 04/02/2018
 * Time: 13:20
 */

namespace CalcTest\Operations;

use Calc\Operations\Incrementation;
use Calc\Operations\OperationInterface;
use PHPUnit\Framework\TestCase;

class IncrementTest extends TestCase
{
    public function testCreateOperation()
    {
        $operation = new Incrementation();
        $this->assertInstanceOf(OperationInterface::class, $operation);
        return $operation;
    }

    /**
     * @depends testCreateOperation
     * @param Incrementation $operation
     */
    public function testOperationResult(Incrementation $operation)
    {
        $operation->setArguments([5]);
        $result = $operation->run();
        $this->assertEquals(6, $result);
    }
}