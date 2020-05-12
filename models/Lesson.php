<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lesson".
 *
 * @property int $lesson_id
 * @property string $lesson_date
 * @property string $lesson_name
 * @property string $lesson_detail
 * @property string $lesson_file
 * @property string $username
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lesson';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lesson_date', 'lesson_name', 'lesson_detail', 'lesson_file', 'username'], 'required'],
            [['lesson_date'], 'safe'],
            [['lesson_detail'], 'string'],
            [['lesson_name'], 'string', 'max' => 200],
            [['lesson_file'], 'string', 'max' => 100],
            [['username'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lesson_id' => 'Lesson ID',
            'lesson_date' => 'วันที่บันทึก',
            'lesson_name' => 'บทเรียน',
            'lesson_detail' => 'Lesson Detail',
            'lesson_file' => 'Lesson File',
            'username' => 'Username',
        ];
    }
}
