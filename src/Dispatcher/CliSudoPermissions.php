<?php

namespace Sid\Phalcon\Events\Dispatcher;

use Phalcon\Cli\DispatcherInterface as CliDispatcherInterface;
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;

class CliSudoPermissions extends Plugin
{
    /**
     * @throws \Phalcon\Cli\Dispatcher\Exception
     */
    public function beforeExecuteRoute(Event $event, CliDispatcherInterface $dispatcher, $data)
    {
        $methodAnnotations = $this->annotations->getMethod(
            $dispatcher->getHandlerClass(),
            $dispatcher->getActiveMethod()
        );

        if (!$methodAnnotations->has("RequiresSudo")) {
            return true;
        }

        if (posix_getuid() !== 0) {
            throw new \Phalcon\Cli\Dispatcher\Exception(
                "This action requires sudo."
            );
        }
    }
}
