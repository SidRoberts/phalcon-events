<?php

namespace Sid\Phalcon\Events\Dispatcher;

use Exception;
use Phalcon\DispatcherInterface;
use Phalcon\Events\Event;

class ExceptionHandler
{
    /**
     * @var string
     */
    protected $controller;

    /**
     * @var string
     */
    protected $action;



    public function __construct(string $controller = "error", string $action = "exception")
    {
        $this->controller = $controller;
        $this->action     = $action;
    }



    public function beforeException(Event $event, DispatcherInterface $dispatcher, Exception $exception) : bool
    {
        $dispatcher->forward(
            [
                "controller" => $this->controller,
                "action"     => $this->action,
                "params"     => [
                    $exception,
                ],
            ]
        );

        return false;
    }
}
