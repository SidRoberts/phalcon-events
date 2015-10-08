<?php

namespace Sid\Phalcon\Events\ModelsManager;

class ModelNamespaceSource extends \Phalcon\Mvc\User\Plugin
{
    public function afterInitialize(\Phalcon\Events\Event $event, \Phalcon\Mvc\Model\ManagerInterface $modelsManager, \Phalcon\Mvc\ModelInterface $model)
    {
        $className = get_class($model);

        $className = str_replace("\\", "_", $className);

        $modelsManager->setModelSource($model, $className);
    }
}
