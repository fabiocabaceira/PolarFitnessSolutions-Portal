<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Workout_plan_exercise_relation;

/**
 * Workout_plan_exercise_relationSearch represents the model behind the search form of `frontend\models\Workout_plan_exercise_relation`.
 */
class Workout_plan_exercise_relationSearch extends Workout_plan_exercise_relation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'workout_plan_id', 'exercise_id'], 'integer'],
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
        $query = Workout_plan_exercise_relation::find();

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
            'workout_plan_id' => $this->workout_plan_id,
            'exercise_id' => $this->exercise_id,
        ]);

        return $dataProvider;
    }
}
