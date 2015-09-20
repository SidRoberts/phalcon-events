<?php

namespace Sid\Phalcon\Events\ModelsManager;

class ModelNamespaceSource extends \Phalcon\Mvc\User\Plugin
{
    public function afterInitialize($event, $modelsManager, $model)
    {
        $className = get_class($model);

        $className = str_replace("\\", "_", $className);

        $modelsManager->setModelSource($model, $className);
    }
}
