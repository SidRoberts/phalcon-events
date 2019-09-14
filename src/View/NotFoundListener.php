<?php

namespace Sid\Phalcon\Events\View;

use Phalcon\Events\Event;
use Phalcon\Logger\AdapterInterface as LoggerAdapterInterface;
use Phalcon\Mvc\ViewInterface;

/**
 * Logs not found view events.
 */
class NotFoundListener
{
    /**
     * @var LoggerAdapterInterface
     */
    protected $logger;



    public function __construct(LoggerAdapterInterface $logger)
    {
        $this->logger = $logger;
    }



    /**
     * Notify about not found views.
     */
    public function notFoundView(Event $event, ViewInterface $view, $enginePath) : bool
    {
        if ($enginePath && !is_array($enginePath)) {
            $enginePath = [$enginePath];
        }

        $message = sprintf(
            "View was not found in any of the views directory. Active render paths: [%s]",
            ($enginePath ? join(", ", $enginePath) : gettype($enginePath))
        );

        $this->logger->error($message);

        return true;
    }
}
