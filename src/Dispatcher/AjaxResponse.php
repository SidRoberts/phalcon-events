<?php

namespace Sid\Phalcon\Events\Dispatcher;

use Phalcon\Events\Event;
use Phalcon\Mvc\DispatcherInterface as MvcDispatcherInterface;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\View;

class AjaxResponse extends Plugin
{
    /**
     * @param Event                  $event
     * @param MvcDispatcherInterface $dispatcher
     */
    public function beforeDispatchLoop(Event $event, MvcDispatcherInterface $dispatcher, $data)
    {
        if ($this->request->isAjax()) {
            $this->view->setRenderLevel(
                View::LEVEL_LAYOUT
            );
        }
    }
}
