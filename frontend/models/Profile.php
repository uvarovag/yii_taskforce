<?php

namespace frontend\models;

use Yii;

class Profile extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'profile';
    }

    public function rules()
    {
        return [
            [['bd'], 'safe'],
            [['address', 'image_url'], 'string', 'max' => 128],
            [['about'], 'string', 'max' => 255],
            [['phone', 'skype'], 'string', 'max' => 64],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Address',
            'bd' => 'Bd',
            'about' => 'About',
            'phone' => 'Phone',
            'skype' => 'Skype',
            'image_url' => 'Image Url',
        ];
    }

    public function getUsers()
    {
        return $this->hasMany(User::className(), ['profile_id' => 'id']);
    }
}
