<?php
/**
 * Created by PhpStorm.
 * User: kroshilin
 * Date: 05/02/2018
 * Time: 12:11
 */
namespace Calc\Observers;

use GuzzleHttp\Exception\RequestException;
use Maknz\Slack\Client;
use Maknz\Slack\Message;

class Observer implements ObserverInterface
{
    /** @var  Client */
    protected $client;

    public function __construct()
    {
        $this->client = new Client(getenv('SLACK_HOOK'));
    }

    public function notify(string $operation): bool
    {
        $message = new Message($this->client);
        try {
            $message->from('@kroshilin')->to('@kroshilin')->send('Someone used calculator operation ' . $operation);
        } catch (RequestException $e) {
            return false;
        }

        return true;
    }
}
