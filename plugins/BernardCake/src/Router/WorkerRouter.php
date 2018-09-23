<?php

namespace BernardCake\Router;

use Bernard\Envelope;
use Bernard\Router;
use Bernard\Router\SimpleRouter;
use BernardCake\Worker\WorkerInterface;

/**
 * Class WorkerRouter
 * @package BernardCake\Router
 */
class WorkerRouter extends SimpleRouter implements Router
{
    /**
     * @param  string $receiver
     * @return boolean
     */
    protected function accepts($receiver)
    {
        return is_string($receiver) && is_a($receiver, WorkerInterface::class, true);
    }

    public function map(Envelope $envelope)
    {
        $receiver = $this->get($envelope->getName());

        $worker = new $receiver();
        if (method_exists($worker, 'initialize')) {
            $worker->initialize($envelope);
        }

        return [$worker, 'run'];
    }
}
