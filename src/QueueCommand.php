<?php

namespace League\Tactician\Bernard;

/**
 * Wraps any command to be queueable
 */
abstract class QueueCommand implements QueueableCommand
{
    /**
     * @var string
     */
    private $queueName = 'default';

    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        $className = get_class($this);
        return substr($className, strrpos($className, '\\') + 1);
    }

    /**
     * @param string $queueName
     * @return QueueCommand
     */
    public function onQueue(string $queueName): QueueCommand
    {
        $this->queueName = $queueName;

        return $this;
    }

    /**
     * @return string
     */
    public function getQueueName(): string
    {
        return $this->queueName;
    }
}
