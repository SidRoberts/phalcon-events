<?php

namespace Sid\Phalcon\Events\Dispatcher;

class AjaxResponse extends \Phalcon\Mvc\User\Plugin
{
    public function beforeDispatchLoop(\Phalcon\Events\Event $event, \Phalcon\Mvc\Dispatcher $dispatcher, $data)
    {
        if ($this->request->isAjax()) {
            $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_ACTION_VIEW);
        }
    }
}
