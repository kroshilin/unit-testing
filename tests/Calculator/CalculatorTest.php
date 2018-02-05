<?php
/**
 * Created by PhpStorm.
 * User: kroshilin
 * Date: 04/02/2018
 * Time: 13:20
 */

namespace CalcTest\Calculator;

use Calc\Calculator;
use Calc\Observers\Observer;
use Calc\Operations\Multiplication;
use Calc\Operations\OperationInterface;
use Maknz\Slack\Client;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /** @var  Calculator $calculator */
    protected $calculator;

    /** @var  OperationInterface $operation */
    protected $operation;

    public function setUp()
    {
        $this->calculator = new Calculator();
        $this->operation = $this->getMockBuilder(Multiplication::class)
            ->setMethods(['run', 'setArguments', 'validateArguments'])
            ->getMock();
    }

    public function testDoOperation()
    {
        $this->operation->expects($this->once())
            ->method('setArguments')
            ->with([3,5]);

        $this->operation->expects($this->once())
            ->method('run');

        $this->calculator->doOperation($this->operation, "3,5");
    }

    public function testObserversDidWork()
    {
        $client = $this->createMock(Client::class);
        $observer = $this->getMockBuilder(Observer::class)
            ->setConstructorArgs([$client])
            ->setMethods(['notify'])
            ->getMock();

        $this->calculator->addObserver($observer);

        $observer->expects($this->once())
            ->method('notify')
            ->with($this->operation->getOperationCode());

        $this->calculator->doOperation($this->operation, "3,5");
    }
}