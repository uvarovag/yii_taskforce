<?php

namespace frontend\models;

use Yii;

class Category extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

    public function rules()
    {
        return [
            [['name', 'icon'], 'string', 'max' => 64],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'icon' => 'Icon',
        ];
    }

    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['category_id' => 'id']);
    }

    public function getUserCategories()
    {
        return $this->hasMany(UserCategory::className(), ['category_id' => 'id']);
    }
}
