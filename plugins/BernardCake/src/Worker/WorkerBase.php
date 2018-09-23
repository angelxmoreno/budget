<?php

namespace BernardCake\Worker;

use Bernard\Envelope;
use Bernard\Message\DefaultMessage;

/**
 * Abstract Class WorkerBase
 * @package BernardCake\Worker
 */
abstract class WorkerBase implements WorkerInterface
{
    public function initialize(Envelope $envelope)
    {
    }

    public function run(DefaultMessage $message)
    {
        try {
            $this->execute($message);
        } catch (\Exception $e) {
            echo $e->getTraceAsString();
        }
    }

    abstract public function execute(DefaultMessage $message);
}
