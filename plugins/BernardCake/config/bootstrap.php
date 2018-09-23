<?php

use Bernard\Driver\PhpRedisDriver;
use Bernard\QueueFactory\PersistentFactory;
use Bernard\Serializer\SimpleSerializer;
use Cake\Core\Configure;
use BernardCake\Plugin;

$redis = new \Redis();
$redis->connect('redis');
$redis->setOption(\Redis::OPT_PREFIX, 'bernard2:');

Configure::write(Plugin::NAME, [
    /**
     * @todo would be great to have the driver auto choosen for us based on the protocol of a url similar to how
     * Cache works
     **/
    'driver' => [PhpRedisDriver::class => [$redis]],
    'serializer' => SimpleSerializer::class,
    'queue_factory' => PersistentFactory::class,

    'producer_middlewares' => [],
    'consumer_middlewares' => null,

    'receivers' => null,
    'consumer' => null,
]);
