<?php

namespace League\Tactician\Bernard\Receiver;

use League\Tactician\Bernard\QueueCommand;
use League\Tactician\Bernard\Receiver;

/**
 * Receives a Message from a Consumer and handles it
 */
final class SeparateBusReceiver extends Receiver
{
    /**
     * {@inheritdoc}
     */
    public function handle(QueueCommand $command)
    {
        return $this->commandBus->handle($command);
    }
}
