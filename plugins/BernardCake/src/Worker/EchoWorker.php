<?php

namespace BernardCake\Worker;

use Bernard\Envelope;
use Bernard\Message\DefaultMessage;

/**
 * Class EchoWorker
 * @package BernardCake\Worker
 */
class EchoWorker extends WorkerBase
{
    public function initialize(Envelope $envelope)
    {
        echo "calling initialize with Envelope";
        pr($envelope);
        parent::initialize($envelope);
    }

    public function run(DefaultMessage $message)
    {
        echo "calling run with DefaultMessage";
        pr($message);
        parent::run($message);
    }

    public function execute(DefaultMessage $message)
    {
        echo "calling execute with DefaultMessage as array";
        $data = (array)$message;
        pr($data);
    }
}
