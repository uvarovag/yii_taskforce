<?php

namespace frontend\models;

use Yii;

class Notification extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'notification';
    }

    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['text'], 'string', 'max' => 255],
            [['notification_type'], 'string', 'max' => 64],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'notification_type' => 'Notification Type',
            'user_id' => 'User ID',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
