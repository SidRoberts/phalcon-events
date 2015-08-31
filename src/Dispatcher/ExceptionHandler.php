<?php

namespace Sid\Phalcon\Events\Dispatcher;

class ExceptionHandler extends \Phalcon\Mvc\User\Plugin
{
    public function beforeException(\Phalcon\Events\Event $event, $dispatcher, $exception)
    {
        $dispatcher->forward(
            [
                'controller' => 'error',
                'action'     => 'exception',
                'params'     => [
                    $exception
                ]
            ]
        );

        return false;
    }
}
