<?php

namespace Sid\Phalcon\Events\ModelsManager;

class ModelDynamicUpdate extends \Phalcon\Mvc\User\Plugin
{
    public function afterInitialize($event, $modelsManager, $model)
    {
        $modelsManager->useDynamicUpdate($model, true);
    }
}
