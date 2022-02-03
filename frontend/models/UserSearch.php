<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\User;

class UserSearch extends User
{
    public function rules()
    {
        return [
            [['id', 'rate', 'city_id', 'profile_id'], 'integer'],
            [['email', 'name', 'password', 'created_at', 'updated_at', 'visit_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = User::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'rate' => $this->rate,
            'city_id' => $this->city_id,
            'profile_id' => $this->profile_id,
            'visit_at' => $this->visit_at,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'password', $this->password]);

        return $dataProvider;
    }
}
