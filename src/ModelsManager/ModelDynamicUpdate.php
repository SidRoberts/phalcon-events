<?php

namespace Sid\Phalcon\Events\ModelsManager;

use Phalcon\Events\Event;
use Phalcon\Mvc\Model\ManagerInterface as ModelManagerInterface;
use Phalcon\Mvc\ModelInterface;

/**
 * Enables/disables Dynamic Update for every model.
 *
 * @link https://docs.phalconphp.com/en/latest/reference/models.html#dynamic-update
 */
class ModelDynamicUpdate
{
    /**
     * @var bool
     */
    protected $dynamicUpdate;



    public function __construct(bool $dynamicUpdate = true)
    {
        $this->dynamicUpdate = $dynamicUpdate;
    }



    public function afterInitialize(Event $event, ModelManagerInterface $modelsManager, ModelInterface $model)
    {
        $modelsManager->useDynamicUpdate($model, $this->dynamicUpdate);
    }
}
