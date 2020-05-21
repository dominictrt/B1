<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property int $id รหัส
 * @property int $lesson_id บทเรียน
 * @property int $exam_set_id ชุดคำถาม
 * @property string $title ชื่อชุดเเบบทดสอบ
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class Question extends \app\models\Config
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lesson_id', 'exam_set_id', 'title'], 'required'],
            [['lesson_id', 'exam_set_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at','ans_correct'], 'safe'],
            [['title'], 'string', 'max' => 255],
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
            'exam_set_id' => 'ชุดคำถาม',
            'title' => 'คำถาม',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'ans_correct' =>'คำตอบที่ถูกต้อง'
        ];
    }

    public function getLesson()
    {
        return $this->hasOne(Lesson::className(), ['id' => 'lesson_id']);
    }

    public function getExamSet()
    {
        return $this->hasOne(ExamSet::className(), ['id' => 'exam_set_id']);
    }
}
