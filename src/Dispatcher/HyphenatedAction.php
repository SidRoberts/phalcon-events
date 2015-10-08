<?php

namespace Sid\Phalcon\Events\Dispatcher;

class HyphenatedAction extends \Phalcon\Mvc\User\Plugin
{
    public function beforeDispatchLoop(\Phalcon\Events\Event $event, \Phalcon\DispatcherInterface $dispatcher, $data)
    {
        if ($dispatcher->getActionName()) {
            $actionName = $dispatcher->getActionName();
            $actionName = \Phalcon\Text::camelize($actionName);
            $actionName = lcfirst($actionName);

            $dispatcher->setActionName($actionName);
        }
    }
}
