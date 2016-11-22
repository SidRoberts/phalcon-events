<?php

namespace Sid\Phalcon\Events\ModelsManager;

use Phalcon\Events\Event;
use Phalcon\Mvc\Model\ManagerInterface as ModelManagerInterface;
use Phalcon\Mvc\ModelInterface;
use Phalcon\Mvc\User\Plugin;

/**
 * Enable/disable snapshots for every model.
 *
 * @link https://docs.phalconphp.com/en/latest/reference/models.html#record-snapshots
 */
class ModelSnapshots extends Plugin
{
    /**
     * @var boolean
     */
    protected $keepSnapshots;



    /**
     * @param boolean $keepSnapshots
     */
    public function __construct($keepSnapshots = true)
    {
        $this->keepSnapshots = $keepSnapshots;
    }



    /**
     * @param Event                 $event
     * @param ModelManagerInterface $modelsManager
     * @param ModelInterface        $model
     */
    public function afterInitialize(Event $event, ModelManagerInterface $modelsManager, ModelInterface $model)
    {
        $modelsManager->keepSnapshots($model, $this->keepSnapshots);
    }
}
