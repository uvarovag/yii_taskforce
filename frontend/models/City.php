<?php

namespace frontend\models;

use Yii;

class City extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'city';
    }

    public function rules()
    {
        return [
            [['lat', 'long'], 'number'],
            [['city'], 'string', 'max' => 64],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'City',
            'lat' => 'Lat',
            'long' => 'Long',
        ];
    }

    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['city_id' => 'id']);
    }

    public function getUsers()
    {
        return $this->hasMany(User::className(), ['city_id' => 'id']);
    }
}
