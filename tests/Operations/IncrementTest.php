<?php
/**
 * Created by PhpStorm.
 * User: kroshilin
 * Date: 04/02/2018
 * Time: 13:20
 */

namespace CalcTest\Operations;

use Calc\Exceptions\ArgumentValidationException;
use Calc\Operations\Incrementation;
use Calc\Operations\OperationInterface;
use PHPUnit\Framework\TestCase;

class IncrementTest extends TestCase
{
    public function dataProvider()
    {
        return [
            [0, 1],
            [1, 2],
            [222, 223],
            [-1, 0]
        ];
    }

    public function testCreateOperation()
    {
        $operation = new Incrementation();
        $this->assertInstanceOf(OperationInterface::class, $operation);
        return $operation;
    }

    /**
     * @depends testCreateOperation
     * @param Incrementation $operation
     * @return Incrementation
     */
    public function testValidation(Incrementation $operation)
    {
        $this->expectException(ArgumentValidationException::class);
        $operation->setArguments([5,6]);
        $operation->validateArguments();
        return $operation;
    }

    /**
     * @depends      testCreateOperation
     * @dataProvider dataProvider
     * @param $toIncrement
     * @param $expected
     * @param Incrementation $operation
     */
    public function testOperationResult(int $toIncrement, int $expected, Incrementation $operation)
    {
        $operation->setArguments([$toIncrement]);
        $result = $operation->run();
        $this->assertEquals($expected, $result);
    }
}