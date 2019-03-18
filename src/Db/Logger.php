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
    /**
     * @var LoggerAdapterInterface
     */
    protected $logger;



    public function __construct(LoggerAdapterInterface $logger)
    {
        $this->logger = $logger;
    }



    public function beforeQuery(Event $event, DbAdapterInterface $db, $data)
    {
        $this->logger->debug(
            $db->getSQLStatement()
        );
    }
}
