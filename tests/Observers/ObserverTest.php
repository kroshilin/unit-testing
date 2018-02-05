<?php
/**
 * Created by PhpStorm.
 * User: kroshilin
 * Date: 04/02/2018
 * Time: 13:20
 */

namespace CalcTest\Calculator;

use Calc\Observers\Observer;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Psr7\Request;
use Maknz\Slack\Client;
use PHPUnit\Framework\TestCase;

class ObserverTest extends TestCase
{
    /** @var  Observer $observer */
    protected $observer;

    /** @var  Client $client */
    protected $client;

    public function setUp()
    {
        $this->client = $this->createMock(Client::class);
        $this->observer = new Observer($this->client);
    }

    public function testNotification()
    {
        $this->client->method('sendMessage')->willReturn(true);
        $result = $this->observer->notify('Sample operation');
        $this->assertTrue($result);
    }

    public function testObserversDidWork()
    {
        $this->client->method('sendMessage')->will(
            $this->throwException(new ConnectException("Connection timeout", new Request('post', 'stub')))
        );
        $result = $this->observer->notify('Sample operation');
        $this->assertFalse($result);
    }
}