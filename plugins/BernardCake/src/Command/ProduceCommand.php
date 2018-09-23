<?php

namespace BernardCake\Command;

use BernardCake\BernardCakeMessageAware;
use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;

/**
 * Produce command.
 */
class ProduceCommand extends Command
{
    use BernardCakeMessageAware;

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
        $parser->addArgument('message_name', [
            'required' => true,
            'help' => 'The message name (Queue name)',
            'choices' => $this->getBernardCakeLoader()->getKnownQueues()
        ]);

        $parser->addOption('query_string', [
            'help' => 'A query string use as the data array for the message',
            'short' => 'd',
            'default' => 'hello=world&foo=bar',
            'boolean' => false,
            'multiple' => false
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
        $message_name = $args->getArgument('message_name');
        $query_string = $args->getOption('query_string');
        parse_str($query_string, $data);

        $this->pushMessage($message_name, $data);
    }
}
