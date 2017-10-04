<?php

namespace League\Tactician\Bernard;

use Bernard\Message;
use League\Tactician\CommandBus;

/**
 * Receives a Message from a Consumer
 */
abstract class Receiver
{
    /**
     * @var CommandBus
     */
    protected $commandBus;

    /**
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * Handles the message
     *
     * @param QueueCommand $command
     */
    abstract public function handle(QueueCommand $command);

    /**
     * Makes the receiver callable to be able to register it in a router
     *
     * @param QueueCommand $command
     *
     * @return mixed
     */
    public function __invoke(QueueCommand $command)
    {
        return $this->handle($command);
    }
}
