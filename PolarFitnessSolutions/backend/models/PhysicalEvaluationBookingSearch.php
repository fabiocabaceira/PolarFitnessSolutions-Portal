<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PhysicalEvaluationBooking;

/**
 * PhysicalEvaluationBookingSearch represents the model behind the search form of `backend\models\PhysicalEvaluationBooking`.
 */
class PhysicalEvaluationBookingSearch extends PhysicalEvaluationBooking
{
    public $clientUsername;
    public $workerUsername;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'client_id', 'worker_id'], 'integer'],
            [['clientUsername', 'workerUsername'], 'string'],
            [['booking_date'], 'safe'],
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
        $query = PhysicalEvaluationBooking::find();
        $query->joinWith('worker.user');
        $query->joinWith('client.user');


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['clientUsername'] = [
            'asc' => ['user.username'=>SORT_ASC],
            'desc' => ['user.username'=>SORT_DESC],
        ];

        $dataProvider->sort->attributes['workerUsername'] = [
            'asc' => ['user.username'=>SORT_ASC],
            'desc' => ['user.username'=>SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'booking_date' => $this->booking_date,
        ]);
        $query->andFilterWhere(['like', 'user.username', $this->clientUsername])
            ->andFilterWhere(['like', 'user.username', $this->workerUsername]);


        return $dataProvider;
    }
}
