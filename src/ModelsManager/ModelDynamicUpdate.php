<?php

namespace Sid\Phalcon\Events\ModelsManager;

/**
 * Enables/disables Dynamic Update for every model.
 *
 * @link https://docs.phalconphp.com/en/latest/reference/models.html#dynamic-update
 */
class ModelDynamicUpdate extends \Phalcon\Mvc\User\Plugin
{
    /**
     * @var boolean
     */
    protected $dynamicUpdate;



    /**
     * @param boolean $dynamicUpdate
     */
    public function __construct($dynamicUpdate = true)
    {
        $this->dynamicUpdate = $dynamicUpdate;
    }



    /**
     * @param \Phalcon\Events\Event               $event
     * @param \Phalcon\Mvc\Model\ManagerInterface $modelsManager
     * @param \Phalcon\Mvc\ModelInterface         $model
     */
    public function afterInitialize(\Phalcon\Events\Event $event, \Phalcon\Mvc\Model\ManagerInterface $modelsManager, \Phalcon\Mvc\ModelInterface $model)
    {
        $modelsManager->useDynamicUpdate($model, $this->dynamicUpdate);
    }
}
