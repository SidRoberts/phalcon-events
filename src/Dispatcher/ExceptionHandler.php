<?php

namespace Sid\Phalcon\Events\Dispatcher;

class ExceptionHandler extends \Phalcon\Mvc\User\Plugin
{
    /**
     * @param \Phalcon\Events\Event        $event
     * @param \Phalcon\DispatcherInterface $dispatcher
     * @param \Exception                   $exception
     *
     * @return boolean
     */
    public function beforeException(\Phalcon\Events\Event $event, \Phalcon\DispatcherInterface $dispatcher, \Exception $exception)
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
