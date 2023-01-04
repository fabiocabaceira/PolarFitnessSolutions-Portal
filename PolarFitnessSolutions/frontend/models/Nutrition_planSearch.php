<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\nutrition_plan;

/**
 * nutrition_planSearch represents the model behind the search form of `frontend\models\nutrition_plan`.
 */
class nutrition_planSearch extends nutrition_plan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'client_id', 'worker_id'], 'integer'],
            [['nutritionname', 'content'], 'safe'],
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
        $query = nutrition_plan::find();

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
            'client_id' => $this->client_id,
            'worker_id' => $this->worker_id,
        ]);

        $query->andFilterWhere(['like', 'nutritionname', $this->nutritionname])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
