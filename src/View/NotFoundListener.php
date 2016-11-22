<?php

namespace Sid\Phalcon\Events\View;

/**
 * Logs not found view events.
 */
class NotFoundListener extends \Phalcon\Mvc\User\Plugin
{
    protected $logger;

    /**
     * @param \Phalcon\Logger\AdapterInterface $logger
     */
    public function __construct(\Phalcon\Logger\AdapterInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Notify about not found views.
     *
     * @param \Phalcon\Events\EventInterface $event
     * @param \Phalcon\Mvc\ViewInterface $view
     * @param mixed $enginePath
     *
     * @return bool
     */
    public function notFoundView(\Phalcon\Events\EventInterface $event, \Phalcon\Mvc\ViewInterface $view, $enginePath)
    {
        if ($enginePath && !is_array($enginePath)) {
            $enginePath = [$enginePath];
        }

        $message = sprintf(
            'View was not found in any of the views directory. Active render paths: [%s]',
            ($enginePath ? join(', ', $enginePath) : gettype($enginePath))
        );

        $this->logger->error($message);

        return true;
    }
}
