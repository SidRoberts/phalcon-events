<?php

namespace Sid\Phalcon\Events\ModelsManager;

/**
 * Enable snapshots for every model.
 *
 * @link https://docs.phalconphp.com/en/latest/reference/models.html#record-snapshots
 */
class ModelSnapshots extends \Phalcon\Mvc\User\Plugin
{
    /**
     * @param \Phalcon\Events\Event               $event
     * @param \Phalcon\Mvc\Model\ManagerInterface $modelsManager
     * @param \Phalcon\Mvc\ModelInterface         $model
     */
    public function afterInitialize(\Phalcon\Events\Event $event, \Phalcon\Mvc\Model\ManagerInterface $modelsManager, \Phalcon\Mvc\ModelInterface $model)
    {
        $modelsManager->keepSnapshots($model, true);
    }
}
