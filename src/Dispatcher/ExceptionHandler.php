<?php

namespace Sid\Phalcon\Events\Dispatcher;

class ExceptionHandler extends \Phalcon\Mvc\User\Plugin
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
