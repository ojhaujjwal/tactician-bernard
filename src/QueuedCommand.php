<?php

namespace League\Tactician\Bernard;

/**
 * Indicates the command has been queued or not
 */
final class QueuedCommand
{
    /**
     * @var object
     */
    private $command;

    /**
     * @param object $command
     */
    public function __construct($command)
    {
        $this->command = $command;
    }

    /**
     * Returns the wrapped command
     *
     * @return object
     */
    public function getCommand()
    {
        return $this->command;
    }
}
