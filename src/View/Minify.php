<?php

namespace Sid\Phalcon\Events\View;

class Minify extends \Phalcon\Mvc\User\Plugin
{
    /**
     * @param \Phalcon\Events\Event      $event
     * @param \Phalcon\Mvc\ViewInterface $view
     */
    public function afterRender(\Phalcon\Events\Event $event, \Phalcon\Mvc\ViewInterface $view)
    {
        $content = $view->getContent();

        $content = preg_replace("/\s+/", " ", $content);

        $view->setContent($content);
    }
}
