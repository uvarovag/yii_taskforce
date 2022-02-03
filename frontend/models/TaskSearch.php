<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Task;

class TaskSearch extends Task
{
    public function rules()
    {
        return [
            [['id', 'category_id', 'budget', 'employer_id', 'executor_id', 'city_id'], 'integer'],
            [['created_at', 'updated_at', 'description', 'expire', 'name', 'address', 'status'], 'safe'],
            [['lat', 'long'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Task::find();

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
            'category_id' => $this->category_id,
            'expire' => $this->expire,
            'budget' => $this->budget,
            'lat' => $this->lat,
            'long' => $this->long,
            'employer_id' => $this->employer_id,
            'executor_id' => $this->executor_id,
            'city_id' => $this->city_id,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
