<?php

namespace frontend\models;

use Yii;

class Feedback extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'feedback';
    }

    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['rate', 'user_id', 'task_id'], 'integer'],
            [['description'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'rate' => 'Rate',
            'description' => 'Description',
            'user_id' => 'User ID',
            'task_id' => 'Task ID',
        ];
    }

    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
