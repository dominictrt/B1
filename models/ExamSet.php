<?php

namespace app\models;

use Yii;


class ExamSet extends \app\models\Config
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exam_set';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lesson_id', 'created_by', 'updated_by', 'created_at', 'updated_at', 'name'], 'required'],
            [['lesson_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัส',
            'lesson_id' => 'บทเรียน',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'name' => 'ชื่อชุดข้อสอบ',
        ];
    }
}
