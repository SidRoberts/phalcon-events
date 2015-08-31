<?php

namespace Sid\Phalcon\Events\Dispatcher;

class CliSudoPermissions extends \Phalcon\Mvc\User\Plugin
{
    public function beforeExecuteRoute(\Phalcon\Events\Event $event, \Phalcon\Cli\Dispatcher $dispatcher, $data)
    {
        $methodAnnotations = $this->annotations->getMethod(
            $dispatcher->getHandlerClass(),
            $dispatcher->getActiveMethod()
        );

        if ($methodAnnotations->has('RequiresSudo')) {
            if (posix_getuid() != 0) {
                throw new \Phalcon\Cli\Dispatcher\Exception('This action requires sudo.');
            }
        }
    }
}
