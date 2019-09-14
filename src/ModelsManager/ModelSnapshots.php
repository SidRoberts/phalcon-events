<?php

namespace Sid\Phalcon\Events\ModelsManager;

use Phalcon\Events\Event;
use Phalcon\Mvc\Model\ManagerInterface as ModelManagerInterface;
use Phalcon\Mvc\ModelInterface;

/**
 * Enable/disable snapshots for every model.
 *
 * @link https://docs.phalconphp.com/en/latest/reference/models.html#record-snapshots
 */
class ModelSnapshots
{
    /**
     * @var bool
     */
    protected $keepSnapshots;



    public function __construct(bool $keepSnapshots = true)
    {
        $this->keepSnapshots = $keepSnapshots;
    }



    public function afterInitialize(Event $event, ModelManagerInterface $modelsManager, ModelInterface $model)
    {
        $modelsManager->keepSnapshots($model, $this->keepSnapshots);
    }
}
