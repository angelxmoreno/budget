<?php

namespace BernardCake\Command;

use BernardCake\Loader\ConfigLoader;
use Bernard\Consumer;
use Bernard\Middleware;
use BernardCake\Router\WorkerRouter;
use BernardCake\Worker\EchoWorker;
use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;

/**
 * Class ConsumeCakeCommand
 * @package BernardCake\Command
 */
class ConsumeCakeCommand extends Command
{
    /**
     * @var ConfigLoader
     */
    protected $loader;

    public function initialize()
    {
        parent::initialize();
        $this->loader = new ConfigLoader();
    }

    /**
     * Hook method for defining this command's option parser.
     *
     * @see https://book.cakephp.org/3.0/en/console-and-shells/commands.html#defining-arguments-and-options
     *
     * @param \Cake\Console\ConsoleOptionParser $parser The parser to be defined
     * @return \Cake\Console\ConsoleOptionParser The built parser.
     */
    public function buildOptionParser(ConsoleOptionParser $parser)
    {
        $parser = parent::buildOptionParser($parser);

        return $parser;
    }

    /**
     * @param Arguments $args
     * @param ConsoleIo $io
     * @return int|null|void
     * @throws \ReflectionException
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $router = new WorkerRouter();
        $router->add('EchoTime', EchoWorker::class);

        $queues = $this->loader->getQueueFactory();

        $consumer_middleware = new Middleware\MiddlewareBuilder;
        $consumer_middleware->push(new Middleware\ErrorLogFactory);
        $consumer_middleware->push(new Middleware\FailuresFactory($queues));

        $consumer = new Consumer($router, $consumer_middleware);
        $consumer->consume($queues->create('echo-time'));
    }
}
