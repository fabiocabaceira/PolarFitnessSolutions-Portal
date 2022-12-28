<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Workout_plan;

/**
 * Workout_planSearch represents the model behind the search form of `frontend\models\Workout_plan`.
 */
class Workout_planSearch extends Workout_plan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'worker_id'], 'integer'],
            [['workout_name', 'createdate'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Workout_plan::find();

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
            'createdate' => $this->createdate,
            'user_id' => $this->user_id,
            'worker_id' => $this->worker_id,
        ]);

        $query->andFilterWhere(['like', 'workout_name', $this->workout_name]);

        return $dataProvider;
    }
}
