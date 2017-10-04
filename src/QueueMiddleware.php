<?php

namespace League\Tactician\Bernard;

use Bernard\Message;
use Bernard\Producer;
use League\Tactician\Command;
use League\Tactician\Middleware;

/**
 * Sends the command to a remote location using message queues
 */
final class QueueMiddleware implements Middleware
{
    /**
     * @var Producer
     */
    private $producer;

    /**
     * @param Producer $producer
     */
    public function __construct(Producer $producer)
    {
        $this->producer = $producer;
    }

    /**
     * {@inheritdoc}
     */
    public function execute($command, callable $next)
    {
        if ($command instanceof QueueCommand) {
            $this->producer->produce($command, $command->getQueueName());
            return;
        }

        if ($command instanceof QueuedCommand) {
            $command = $command->getCommand();
        }

        return $next($command);
    }
}
