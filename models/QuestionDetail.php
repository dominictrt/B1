<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question_detail".
 *
 * @property int $q_id
 * @property string $qu_id
 * @property string $qu_detail
 * @property string $ans1
 * @property string $ans2
 * @property string $ans3
 * @property string $ans4
 * @property string $ans_correct
 */
class QuestionDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['qu_id', 'qu_detail', 'ans1', 'ans2', 'ans3', 'ans4', 'ans_correct'], 'required'],
            [['qu_detail'], 'string'],
            [['qu_id'], 'string', 'max' => 5],
            [['ans1', 'ans2', 'ans3', 'ans4', 'ans_correct'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'q_id' => 'Q ID',
            'qu_id' => 'Qu ID',
            'qu_detail' => 'Qu Detail',
            'ans1' => 'Ans1',
            'ans2' => 'Ans2',
            'ans3' => 'Ans3',
            'ans4' => 'Ans4',
            'ans_correct' => 'Ans Correct',
        ];
    }
}
