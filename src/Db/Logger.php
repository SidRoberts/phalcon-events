<?php

namespace Sid\Phalcon\Events\Db;

/**
 * Logs database queries.
 */
class Logger extends \Phalcon\Mvc\User\Plugin
{
    protected $logger;

    /**
     * @param \Phalcon\Logger\AdapterInterface $logger
     */
    public function __construct(\Phalcon\Logger\AdapterInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param \Phalcon\Events\Event        $event
     * @param \Phalcon\Db\AdapterInterface $db
     */
    public function beforeQuery(\Phalcon\Events\Event $event, \Phalcon\Db\AdapterInterface $db, $data)
    {
        $this->logger->debug(
            $db->getSQLStatement()
        );
    }
}
