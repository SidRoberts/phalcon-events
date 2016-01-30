<?php

namespace Sid\Phalcon\Events\Db;

class Logger extends \Phalcon\Mvc\User\Plugin
{
    /**
     * @param \Phalcon\Events\Event        $event
     * @param \Phalcon\Db\AdapterInterface $db
     */
    public function beforeQuery(\Phalcon\Events\Event $event, \Phalcon\Db\AdapterInterface $db, $data)
    {
        $logger = new \Phalcon\Logger\Adapter\File("logs/db.log");

        $logger->debug(
            $db->getSQLStatement()
        );
    }
}
