<?php

namespace Sid\Phalcon\Events\View;

use Phalcon\Events\Event;
use Phalcon\Mvc\ViewInterface;

class Minify
{
    public function afterRender(Event $event, ViewInterface $view)
    {
        $content = $view->getContent();

        $content = preg_replace("/\s+/", " ", $content);

        $view->setContent($content);
    }
}
