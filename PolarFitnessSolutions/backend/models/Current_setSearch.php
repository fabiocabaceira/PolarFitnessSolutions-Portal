<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Current_set;

/**
 * Current_setSearch represents the model behind the search form of `app\models\Current_set`.
 */
class Current_setSearch extends Current_set
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'reps', 'exercise_id'], 'integer'],
            [['set_weight'], 'number'],
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
        $query = Current_set::find();

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
            'reps' => $this->reps,
            'set_weight' => $this->set_weight,
            'exercise_id' => $this->exercise_id,
        ]);

        return $dataProvider;
    }
}
