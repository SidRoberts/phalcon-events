<?php

namespace Sid\Phalcon\Events\Db;

use Phalcon\Db\AdapterInterface as DbAdapterInterface;
use Phalcon\Events\Event;
use Phalcon\Logger\AdapterInterface as LoggerAdapterInterface;
use Phalcon\Mvc\User\Plugin;

/**
 * Logs database queries.
 */
class Logger extends Plugin
{
    protected $logger;

    /**
     * @param LoggerAdapterInterface $logger
     */
    public function __construct(LoggerAdapterInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param Event              $event
     * @param DbAdapterInterface $db
     */
    public function beforeQuery(Event $event, DbAdapterInterface $db, $data)
    {
        $this->logger->debug(
            $db->getSQLStatement()
        );
    }
}
