<?php

namespace Sid\Phalcon\Events\ModelsManager;

class ModelDynamicUpdate extends \Phalcon\Mvc\User\Plugin
{
    public function afterInitialize(\Phalcon\Events\Event $event, \Phalcon\Mvc\Model\ManagerInterface $modelsManager, \Phalcon\Mvc\ModelInterface $model)
    {
        $modelsManager->useDynamicUpdate($model, true);
    }
}
