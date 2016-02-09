<?php

namespace Sid\Phalcon\Events\Model;

/**
 * Enable automatic preservation of dates of creation and change at existence of the corresponding fields
 */
class ModelCreatedUpdatedDates extends \Phalcon\Mvc\User\Plugin
{

    /**
     * @param \Phalcon\Events\Event               $event
     * @param \Phalcon\Mvc\ModelInterface         $model
     */
    public function beforeValidationOnCreate(\Phalcon\Events\Event $event, \Phalcon\Mvc\ModelInterface $model)
    {

        if ($model->getModelsMetaData()->hasAttribute($model, 'created_at')) {
            $model->created_at = date('Y-m-d H:i:s');
        }
    }

    /**
     * @param \Phalcon\Events\Event               $event
     * @param \Phalcon\Mvc\ModelInterface         $model
     */
    public function beforeValidationOnUpdate(\Phalcon\Events\Event $event, \Phalcon\Mvc\ModelInterface $model)
    {

        if ($model->getModelsMetaData()->hasAttribute($model, 'updated_at')) {
            $model->updated_at = date('Y-m-d H:i:s');
        }
    }

}
