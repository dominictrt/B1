<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question_list".
 *
 * @property int $id
 * @property int $lesson_id
 * @property int $exam_set_id
 * @property int $question_id
 * @property string $clause ข้อ
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class QuestionList extends \app\models\Config
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lesson_id', 'exam_set_id', 'question_id', 'clause', 'title', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['lesson_id', 'exam_set_id', 'question_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['clause'], 'string', 'max' => 1],
            [['title'], 'string', 'max' => 255],
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
            'clause' => 'ข้อ',
            'title' => 'Title',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    public function getLesson()
    {
        return $this->hasOne(Lesson::className(), ['id' => 'lesson_id']);
    }
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id' => 'question_id']);
    }

    public function getExamSet()
    {
        return $this->hasOne(ExamSet::className(), ['id' => 'exam_set_id']);
    }

}
