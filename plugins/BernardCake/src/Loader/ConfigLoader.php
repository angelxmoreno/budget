<?php

namespace BernardCake\Loader;

use Bernard\Consumer;
use Bernard\Driver;
use Bernard\Middleware\MiddlewareBuilder;
use Bernard\Producer;
use Bernard\QueueFactory;
use Bernard\Router;
use Bernard\Serializer;
use BernardCake\Plugin;
use BernardCake\Router\WorkerRouter;
use Cake\Core\Configure;
use Cake\Core\InstanceConfigTrait;
use ReflectionException;
use UnexpectedValueException;

/**
 * Class ConfigLoader
 * @package BernardCake\Loader
 */
class ConfigLoader
{
    use InstanceConfigTrait;

    /**
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * @var Driver
     */
    protected $driver;

    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * @var QueueFactory
     */
    protected $queue_factory;

    /**
     * @var MiddlewareBuilder
     */
    protected $producer_middleware;

    /**
     * @var Producer
     */
    protected $producer;

    /**
     * @var MiddlewareBuilder
     */
    protected $consumer_middleware;

    /**
     * @var Consumer
     */
    protected $consumer;

    /**
     * @var Router
     */
    protected $router;

    /**
     * Loader constructor.
     */
    public function __construct()
    {
        $this->setConfig(Configure::read(Plugin::NAME));
    }

    /**
     * @return array
     */
    public function getKnownQueues() : array
    {
        return array_keys($this->getConfig('routes'));
    }

    /**
     * @return Producer
     * @throws ReflectionException
     */
    public function getProducer() : Producer
    {
        if (!$this->producer) {
            $this->producer = new Producer($this->getQueueFactory(), $this->getProducerMiddleware());
        }

        return $this->producer;
    }

    /**
     * @return QueueFactory
     * @throws ReflectionException
     */
    public function getQueueFactory() : QueueFactory
    {
        if (!$this->queue_factory) {
            $params = [];
            $queue_factory_class = $this->getConfig('queue_factory');
            switch ($queue_factory_class) {
                case QueueFactory\PersistentFactory::class :
                    $params = [$this->getDriver(), $this->getSerializer()];
                    break;

                default:
                    throw new UnexpectedValueException("'{$queue_factory_class}' is not compatible");

            }

            $this->queue_factory = $this->instance([$queue_factory_class => $params]);
        }

        return $this->queue_factory;
    }

    /**
     * @return Driver
     * @throws ReflectionException
     */
    public function getDriver() : Driver
    {
        if (!$this->driver) {
            $this->driver = $this->instance($this->getConfig('driver'));
        }

        return $this->driver;
    }

    /**
     * @param string|array $class_name
     * @return object
     * @throws ReflectionException
     */
    protected function instance($class_name)
    {
        if (is_array($class_name)) {
            $class = key($class_name);
            $params = current($class_name);
            foreach ($params as $index => $param) {
                if (is_string($param) && preg_match('~::(get[^:]+)::~', $param, $matches)) {
                    $getter = $matches[1];

                    if (!method_exists($this, $getter)) {
                        throw new UnexpectedValueException(sprintf(
                            "Given param '%s' interpreted as '%s' but method does not exist",
                            $param,
                            "->{$getter}()"
                        ));
                    }
                    $params[$index] = $this->{$getter}();
                }
            }

            $reflection = new \ReflectionClass($class);

            return $reflection->newInstanceArgs($params);
        }

        return new $class_name;
    }

    /**
     * @return Serializer
     * @throws ReflectionException
     */
    public function getSerializer() : Serializer
    {
        if (!$this->serializer) {
            $this->serializer = $this->instance($this->getConfig('serializer'));
        }

        return $this->serializer;
    }

    /**
     * @return MiddlewareBuilder
     * @throws ReflectionException
     */
    public function getProducerMiddleware() : MiddlewareBuilder
    {
        if (!$this->producer_middleware) {
            $middleware_configs = $this->getConfig('producer_middlewares');
            $this->producer_middleware = $this->buildMiddlewareCollection($middleware_configs);
        }

        return $this->producer_middleware;
    }

    /**
     * @param array $middleware_configs
     * @return MiddlewareBuilder
     * @throws ReflectionException
     */
    protected function buildMiddlewareCollection(array $middleware_configs = []) : MiddlewareBuilder
    {
        $middleware_collection = new MiddlewareBuilder();
        foreach ($middleware_configs as $middleware_config) {
            /** @var callable $middleware */
            $middleware = $this->instance($middleware_config);
            $middleware_collection->push($middleware);
        }

        return $middleware_collection;
    }

    /**
     * @return Consumer
     * @throws ReflectionException
     */
    public function getConsumer() : Consumer
    {
        if (!$this->consumer) {
            $this->consumer = new Consumer($this->getRouter(), $this->getConsumerMiddleware());
        }

        return $this->consumer;
    }

    /**
     * @return Router
     */
    public function getRouter() : Router
    {
        if (!$this->router) {
            $this->router = new WorkerRouter($this->getConfig('routes'));
        }

        return $this->router;
    }

    /**
     * @return MiddlewareBuilder
     * @throws ReflectionException
     */
    public function getConsumerMiddleware() : MiddlewareBuilder
    {
        if (!$this->consumer_middleware) {
            $middleware_configs = $this->getConfig('consumer_middlewares');
            $this->consumer_middleware = $this->buildMiddlewareCollection($middleware_configs);
        }

        return $this->consumer_middleware;
    }
}
