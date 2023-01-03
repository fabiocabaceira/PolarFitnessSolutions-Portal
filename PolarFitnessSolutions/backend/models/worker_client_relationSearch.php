<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\WorkerClientRelation;

/**
 * worker_client_relationSearch represents the model behind the search form of `backend\models\WorkerClientRelation`.
 */
class worker_client_relationSearch extends WorkerClientRelation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'client_id', 'worker_id'], 'integer'],
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
        $query = WorkerClientRelation::find()->leftJoin('client', 'worker_client_relation.client_id=client.client_id')->with('client')->leftJoin('worker', 'worker_client_relation.worker_id=worker.worker_id')->with('worker');

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
            'client_id' => $this->client_id,
            'worker_id' => $this->worker_id,
        ]);

        return $dataProvider;
    }
}
