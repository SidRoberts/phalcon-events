<?php

namespace Sid\Phalcon\Events\Dispatcher;

use Phalcon\Events\Event;
use Phalcon\Mvc\DispatcherInterface as MvcDispatcherInterface;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\View;

class AjaxResponse extends Plugin
{
    public function beforeDispatchLoop(Event $event, MvcDispatcherInterface $dispatcher, $data)
    {
        // Ignore non-Ajax requests
        if (!$this->request->isAjax()) {
            return true;
        }

        $this->view->setRenderLevel(
            View::LEVEL_LAYOUT
        );
    }
}
