<?php

namespace League\Tactician\Bernard\Receiver;

use League\Tactician\Bernard\QueuedCommand;
use League\Tactician\Bernard\Receiver;
use League\Tactician\Bernard\QueueCommand;

/**
 * Receives a Message from a Consumer and handles it (additionally prevents it from being requeued)
 */
final class SameBusReceiver extends Receiver
{
    /**
     * {@inheritdoc}
     */
    public function handle(QueueCommand $command)
    {
        return $this->commandBus->handle(new QueuedCommand($command));
    }
}
