<?php

namespace Sid\Phalcon\Events\Dispatcher;

class JsonResponse extends \Phalcon\Mvc\User\Plugin
{
    public function afterDispatchLoop(\Phalcon\Events\Event $event, \Phalcon\Mvc\DispatcherInterface $dispatcher, $data)
    {
        $data = $dispatcher->getReturnedValue();

        $this->response->setJsonContent($data, JSON_PRETTY_PRINT);
        $this->response->setContentType("application/json", "UTF-8");
        $this->response->setHeader('Cache-Control', 'private, max-age=0, must-revalidate');

        $this->response->send();
    }
}
