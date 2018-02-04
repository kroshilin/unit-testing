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
use PHPUnit\Framework\TestCase;

class IncrementTest extends TestCase
{
    /** @var  Incrementation $operation */
    protected $operation;

    public function setUp()
    {
        $this->operation = new Incrementation();
    }

    public function dataProvider()
    {
        return [
            [0, 1],
            [1, 2],
            [222, 223],
            [-1, 0]
        ];
    }

    /**
     * @return Incrementation
     */
    public function testValidation()
    {
        $this->expectException(ArgumentValidationException::class);
        $this->operation->setArguments([5,6]);
        $this->operation->validateArguments();
        return $this->operation;
    }

    /**
     * @dataProvider dataProvider
     * @param $toIncrement
     * @param $expected
     */
    public function testOperationResult(int $toIncrement, int $expected)
    {
        $this->operation->setArguments([$toIncrement]);
        $result = $this->operation->run();
        $this->assertEquals($expected, $result);
    }
}