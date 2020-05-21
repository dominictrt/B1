<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;

class Config extends \yii\db\ActiveRecord
{
  
    public function behaviors() {
       return [
           [
               'class' => AttributeBehavior::className(),
               'attributes' => [ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at']],
               'value' => new Expression('NOW()'),
           ],
           [
               'class' => AttributeBehavior::className(),
               'attributes' => [ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at'],
               'value' => new Expression('NOW()'),
           ],
           [
               'class' => BlameableBehavior::className(),
               'createdByAttribute' => 'created_by',
               'updatedByAttribute' => 'updated_by',
           ]
       ];
    }

}
