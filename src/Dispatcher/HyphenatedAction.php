<?php

namespace Sid\Phalcon\Events\Dispatcher;

use Phalcon\DispatcherInterface;
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Text;

class HyphenatedAction extends Plugin
{
    /**
     * @param Event               $event
     * @param DispatcherInterface $dispatcher
     */
    public function beforeDispatchLoop(Event $event, DispatcherInterface $dispatcher, $data)
    {
        if ($dispatcher->getActionName()) {
            $actionName = $dispatcher->getActionName();
            $actionName = Text::camelize($actionName);
            $actionName = lcfirst($actionName);

            $dispatcher->setActionName($actionName);
        }
    }
}
