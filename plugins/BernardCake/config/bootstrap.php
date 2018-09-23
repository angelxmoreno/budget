<?php

use Bernard\Driver;
use Bernard\QueueFactory\PersistentFactory;
use Bernard\Serializer\SimpleSerializer;
use BernardCake\Plugin;
use Cake\Core\Configure;

$defaults = [
    /**
     * @todo would be great to have the driver auto choosen for us based on the protocol of a url similar to how
     * Cache works
     **/
    'driver' => [Driver\FlatFileDriver::class => [CACHE . 'BernardQueue' . DS]],
    'serializer' => SimpleSerializer::class,
    'queue_factory' => PersistentFactory::class,

    'producer_middlewares' => [],
    'consumer_middlewares' => [
        \Bernard\Middleware\ErrorLogFactory::class,
        [\Bernard\Middleware\FailuresFactory::class => ['::getQueueFactory::']]
    ],

    'routes' => [
        'EchoTime' => \BernardCake\Worker\EchoWorker::class
    ],
];

$config = Configure::read(Plugin::NAME, []);
Configure::write(Plugin::NAME, array_merge($defaults, $config));
