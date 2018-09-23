<?php

namespace BernardCake\Worker;

use Bernard\Message\DefaultMessage;

/**
 * Interface WorkerInterface
 * @package  BernardCake\Worker
 */
interface WorkerInterface
{
    public function run(DefaultMessage $message);

    public function execute(DefaultMessage $message);
}
