<?php

namespace Sid\Phalcon\Events\ModelsManager;

class ModelSnapshots extends \Phalcon\Mvc\User\Plugin
{
    public function afterInitialize(\Phalcon\Events\Event $event, \Phalcon\Mvc\Model\ManagerInterface $modelsManager, \Phalcon\Mvc\ModelInterface $model)
    {
        $modelsManager->keepSnapshots($model, true);

        $model->setSnapshotData($model->toArray());
    }
}
