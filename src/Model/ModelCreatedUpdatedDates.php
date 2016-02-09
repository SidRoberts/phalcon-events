<?php

namespace Sid\Phalcon\Events\Model;

/**
 * Enable automatic preservation of dates of creation and change at existence of the corresponding fields
 */
class ModelCreatedUpdatedDates extends \Phalcon\Mvc\User\Plugin
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
     * @param \Phalcon\Events\Event       $event
     * @param \Phalcon\Mvc\ModelInterface $model
     */
    public function beforeValidationOnCreate(\Phalcon\Events\Event $event, \Phalcon\Mvc\ModelInterface $model)
    {
        if ($model->getModelsMetaData()->hasAttribute($model, $this->createdField)) {
            $model->assign(
                [
                    $this->createdField => date('Y-m-d H:i:s')
                ]
            );
        }
    }

    /**
     * @param \Phalcon\Events\Event       $event
     * @param \Phalcon\Mvc\ModelInterface $model
     */
    public function beforeValidationOnUpdate(\Phalcon\Events\Event $event, \Phalcon\Mvc\ModelInterface $model)
    {
        if ($model->getModelsMetaData()->hasAttribute($model, $this->updatedField)) {
            $model->assign(
                [
                    $this->updatedField => date('Y-m-d H:i:s')
                ]
            );
        }
    }
}
