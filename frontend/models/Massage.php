<?php

namespace frontend\models;

use Yii;

class Massage extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'massage';
    }

    public function rules()
    {
        return [
            [['sender_id', 'recipient_id'], 'integer'],
            [['text'], 'string', 'max' => 255],
            [['sender_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['sender_id' => 'id']],
            [['recipient_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['recipient_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'sender_id' => 'Sender ID',
            'recipient_id' => 'Recipient ID',
        ];
    }

    public function getRecipient()
    {
        return $this->hasOne(User::className(), ['id' => 'recipient_id']);
    }

    public function getSender()
    {
        return $this->hasOne(User::className(), ['id' => 'sender_id']);
    }
}
