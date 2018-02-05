<?php
/**
 * Created by PhpStorm.
 * User: kroshilin
 * Date: 04/02/2018
 * Time: 13:20
 */

namespace CalcTest\Calculator;

use Calc\Observers\Observer;
use PHPUnit\Framework\TestCase;

class ObserverTest extends TestCase
{
    /** @var  Observer $observer */
    protected $observer;

    public function setUp()
    {
        $this->observer = new Observer();
    }

    public function testNotificationSuccess()
    {
       $result = $this->observer->notify('Sample operation');
       $this->assertTrue($result);
    }

    public function testObserversDidWork()
    {
        $result = $this->observer->notify('Sample operation');
        $this->assertFalse($result);
    }
}