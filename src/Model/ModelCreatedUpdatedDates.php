<?php

namespace Sid\Phalcon\Events\Model;

use Phalcon\Events\Event;
use Phalcon\Mvc\ModelInterface;
use Phalcon\Mvc\User\Plugin;

/**
 * Enable automatic preservation of dates of creation and change at existence of the corresponding fields
 */
class ModelCreatedUpdatedDates extends Plugin
{
    /**
     * @var string
     */
    protected $createdField;

    /**
     * @var string
     */
    protected $updatedField;



    /**
     * @param string $createdField
     * @param string $updatedField
     */
    public function __construct($createdField = "created_at", $updatedField = "updated_at")
    {
        $this->createdField = $createdField;
        $this->updatedField = $updatedField;
    }



    /**
     * @param Event          $event
     * @param ModelInterface $model
     */
    public function beforeValidationOnCreate(Event $event, ModelInterface $model)
    {
        $modelsMetadata = $model->getModelsMetaData();

        if ($modelsMetadata->hasAttribute($model, $this->createdField)) {
            $model->assign(
                [
                    $this->createdField => date('Y-m-d H:i:s')
                ]
            );
        }
    }

    /**
     * @param Event          $event
     * @param ModelInterface $model
     */
    public function beforeValidationOnUpdate(Event $event, ModelInterface $model)
    {
        $modelsMetadata = $model->getModelsMetaData();

        if ($modelsMetadata->hasAttribute($model, $this->updatedField)) {
            $model->assign(
                [
                    $this->updatedField => date('Y-m-d H:i:s')
                ]
            );
        }
    }
}
