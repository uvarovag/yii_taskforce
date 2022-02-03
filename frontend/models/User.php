<?php

namespace frontend\models;

use Yii;

class User extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'visit_at'], 'safe'],
            [['rate', 'city_id', 'profile_id'], 'integer'],
            [['email', 'name'], 'string', 'max' => 64],
            [['password'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['profile_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'name' => 'Name',
            'password' => 'Password',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'rate' => 'Rate',
            'city_id' => 'City ID',
            'profile_id' => 'Profile ID',
            'visit_at' => 'Visit At',
        ];
    }

    public function getAvailableNotificationTypes()
    {
        return $this->hasMany(AvailableNotificationType::className(), ['user_id' => 'id']);
    }

    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    public function getFeedbacks()
    {
        return $this->hasMany(Feedback::className(), ['user_id' => 'id']);
    }

    public function getFiles()
    {
        return $this->hasMany(File::className(), ['user_id' => 'id']);
    }

    public function getMassages()
    {
        return $this->hasMany(Massage::className(), ['sender_id' => 'id']);
    }

    public function getMassages0()
    {
        return $this->hasMany(Massage::className(), ['recipient_id' => 'id']);
    }

    public function getNotifications()
    {
        return $this->hasMany(Notification::className(), ['user_id' => 'id']);
    }

    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['id' => 'profile_id']);
    }

    public function getResponses()
    {
        return $this->hasMany(Response::className(), ['user_id' => 'id']);
    }

    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['employer_id' => 'id']);
    }

    public function getTasks0()
    {
        return $this->hasMany(Task::className(), ['executor_id' => 'id']);
    }

    public function getUserCategories()
    {
        return $this->hasMany(UserCategory::className(), ['user_id' => 'id']);
    }
}
