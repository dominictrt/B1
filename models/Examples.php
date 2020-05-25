<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "examples".
 *
 * @property int $id
 * @property int $lesson_id
 * @property int $exam_set_id
 * @property int $question_id
 * @property string $answer
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class Examples extends  \app\models\Config
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'examples';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lesson_id', 'exam_set_id', 'question_id', 'answer'], 'required'],
            [['lesson_id', 'exam_set_id', 'question_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['answer'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lesson_id' => 'Lesson ID',
            'exam_set_id' => 'Exam Set ID',
            'question_id' => 'Question ID',
            'answer' => 'Answer',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
