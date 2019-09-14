<?php

namespace Sid\Phalcon\Events\ModelsManager;

use Phalcon\Events\Event;
use Phalcon\Mvc\Model\ManagerInterface as ModelManagerInterface;
use Phalcon\Mvc\ModelInterface;

/**
 * Allows you to use models in different namespaces without having to worry
 * about conflicting names.
 *
 * Sid\Models\Posts -> "Sid_Models_Posts"
 */
class ModelNamespaceSource
{
    public function afterInitialize(Event $event, ModelManagerInterface $modelsManager, ModelInterface $model)
    {
        $className = get_class($model);

        $className = str_replace("\\", "_", $className);

        $modelsManager->setModelSource($model, $className);
    }
}
