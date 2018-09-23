<?php

namespace BernardCake\Command;

use Bernard\Message\DefaultMessage;
use BernardCake\Loader\ConfigLoader;
use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;

/**
 * Produce command.
 */
class ProduceCommand extends Command
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
        $producer = $this->loader->getProducer();

        $producer->produce(new DefaultMessage('EchoTime', array(
            'time' => time(),
        )));
    }
}
