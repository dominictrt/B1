<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property string $username
 * @property string $password
 * @property string $member_title
 * @property string $member_name
 * @property string $member_mobile
 * @property string $member_email
 * @property string $member_edu
 * @property string $member_status
 * @property string $member_date
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'member_title', 'member_name', 'member_mobile', 'member_email', 'member_edu', 'member_status'], 'required'],
            [['member_date'], 'safe'],
            [['username', 'member_mobile'], 'string', 'max' => 10],
            [['password', 'member_email', 'member_edu'], 'string', 'max' => 100],
            [['member_title'], 'string', 'max' => 3],
            [['member_name'], 'string', 'max' => 50],
            [['member_status'], 'string', 'max' => 1],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'ชื่อเข้าใช้งาน',
            'password' => 'Password',
            'member_title' => 'Member Title',
            'member_name' => 'Member Name',
            'member_mobile' => 'Member Mobile',
            'member_email' => 'Member Email',
            'member_edu' => 'Member Edu',
            'member_status' => 'Member Status',
            'member_date' => 'Member Date',
        ];
    }
}
