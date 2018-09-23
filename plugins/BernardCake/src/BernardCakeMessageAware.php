<?php

namespace BernardCake;

use Bernard\Message\DefaultMessage;
use Bernard\Producer;
use BernardCake\Loader\ConfigLoader;

/**
 * Trait BernardCakeMessageAware
 * @package BernardCake
 */
trait BernardCakeMessageAware
{
    /**
     * @var ConfigLoader
     */
    protected $bernard_cake_loader;

    /**
     * @var Producer
     */
    protected $bernard_cake_producer;

    /**
     * @return ConfigLoader
     */
    public function getBernardCakeLoader() : ConfigLoader
    {
        if (!$this->bernard_cake_loader) {
            $this->bernard_cake_loader = new ConfigLoader();
        }

        return $this->bernard_cake_loader;
    }

    /**
     * @return Producer
     * @throws \ReflectionException
     */
    public function getBernardCakeProducer() : Producer
    {
        if (!$this->bernard_cake_producer) {
            $this->bernard_cake_producer = $this->getBernardCakeLoader()->getProducer();
        }

        return $this->bernard_cake_producer;
    }

    /**
     * @param string $message_name
     * @param array $data
     * @param string|null $queue_name
     * @throws \ReflectionException
     */
    protected function pushMessage(string $message_name, array $data = [], string $queue_name = null)
    {
        $producer = $this->getBernardCakeProducer();
        $message = new DefaultMessage($message_name, $data);
        $producer->produce($message, $queue_name);
    }
}
