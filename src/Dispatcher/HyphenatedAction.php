<?php

namespace Sid\Phalcon\Events\Dispatcher;

use Phalcon\DispatcherInterface;
use Phalcon\Events\Event;
use Phalcon\Text;

class HyphenatedAction
{
    public function beforeDispatchLoop(Event $event, DispatcherInterface $dispatcher, $data)
    {
        // Skip to avoid mutating the action name from null to ''
        if (!$dispatcher->getActionName()) {
            return true;
        }

        $actionName = $dispatcher->getActionName();
        $actionName = Text::camelize($actionName);
        $actionName = lcfirst($actionName);

        $dispatcher->setActionName($actionName);
    }
}
