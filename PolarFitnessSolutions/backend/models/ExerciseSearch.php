<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Exercise;

/**
 * ExerciseSearch represents the model behind the search form of `app\models\Exercise`.
 */
class ExerciseSearch extends Exercise
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'max_rep', 'min_rep'], 'integer'],
            [['exercise_name'], 'safe'],
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
        $query = Exercise::find();

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
            'max_rep' => $this->max_rep,
            'min_rep' => $this->min_rep,
        ]);

        $query->andFilterWhere(['like', 'exercise_name', $this->exercise_name]);

        return $dataProvider;
    }
}
