<?php

namespace Sid\Phalcon\Events\Dispatcher;

class AjaxResponse extends \Phalcon\Mvc\User\Plugin
{
    /**
     * @param \Phalcon\Events\Event            $event
     * @param \Phalcon\Mvc\DispatcherInterface $dispatcher
     */
    public function beforeDispatchLoop(\Phalcon\Events\Event $event, \Phalcon\Mvc\DispatcherInterface $dispatcher, $data)
    {
        if ($this->request->isAjax()) {
            $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_LAYOUT);
        }
    }
}
