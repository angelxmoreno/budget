<?php

namespace BernardCake\Command;

use BernardCake\Loader\ConfigLoader;
use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Cake\Utility\Inflector;

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
        $parser->addArgument('queue', [
            'required' => true,
            'help' => 'The Queue name',
            'choices' => $this->loader->getKnownQueues()
        ]);

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
        $queue_name = Inflector::dasherize($args->getArgument('queue'));
        $queues = $this->loader->getQueueFactory();
        $consumer = $this->loader->getConsumer();
        $consumer->consume($queues->create($queue_name));
    }
}
