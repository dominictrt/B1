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

    public function getExample()
    {
        return $this->hasOne(Examples::className(), ['exam_set_id' => 'id']);
    }

    public function Ans($id){
        //นับคำตอบที่ทำถูกต้อง
          $sql1 = "SELECT COUNT(e.id) as total FROM examples e
                            INNER JOIN question q ON q.ans_correct = e.answer
                            WHERE e.exam_set_id = :id";
                            $query1 = Yii::$app->db->createCommand($sql1)
                            ->bindValue(':id',$id)
                            ->queryOne();

        $query2 =  Yii::$app->db->createCommand("SELECT count(id)as ans FROM question WHERE exam_set_id = :id")
        ->bindValue(':id',$id)
        ->queryOne();
        
        $a = $query1['total'];
        $b = $query2['ans'];
        $p = ($a / $b) * 100;

        return[
            'total' =>  $query1['total'],
            'ans' => $query2['ans'],
            'p' => $p
        ]; 
       
    }
} 
