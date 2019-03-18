<?php

namespace Sid\Phalcon\Events\Dispatcher;

use Exception;
use Phalcon\DispatcherInterface;
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;

class ExceptionHandler extends Plugin
{
    /**
     * @var string
     */
    protected $controller;

    /**
     * @var string
     */
    protected $action;



    /**
     * @param string $controller
     * @param string $action
     */
    public function __construct($controller = "error", $action = "exception")
    {
        $this->controller = $controller;
        $this->action     = $action;
    }



    /**
     * @return boolean
     */
    public function beforeException(Event $event, DispatcherInterface $dispatcher, Exception $exception)
    {
        $dispatcher->forward(
            [
                "controller" => $this->controller,
                "action"     => $this->action,
                "params"     => [
                    $exception
                ]
            ]
        );

        return false;
    }
}
