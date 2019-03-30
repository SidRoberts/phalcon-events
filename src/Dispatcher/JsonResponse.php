<?php

namespace Sid\Phalcon\Events\Dispatcher;

use Phalcon\Events\Event;
use Phalcon\Mvc\DispatcherInterface as MvcDispatcherInterface;
use Phalcon\Mvc\User\Plugin;

class JsonResponse extends Plugin
{
    public function afterDispatchLoop(Event $event, MvcDispatcherInterface $dispatcher, $data)
    {
        $data = $dispatcher->getReturnedValue();

        // Force returned value to an array.
        $dispatcher->setReturnedValue(
            json_decode(
                json_encode($data),
                true
            )
        );



        $this->response->setJsonContent($data, JSON_PRETTY_PRINT);

        $this->response->setContentType("application/json", "UTF-8");

        $this->response->setHeader(
            "Cache-Control",
            "private, max-age=0, must-revalidate"
        );
    }
}
