<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\WorkerClientRelation;


/**
 * worker_client_relationSearch represents the model behind the search form of `frontend\models\WorkerClientRelation`.
 */
class worker_client_relationSearch extends WorkerClientRelation
{

    public $clientUsername;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'client_id', 'worker_id'], 'integer'],
            [['clientUsername'], 'string'],
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
        $id = Yii::$app->user->id;
        $query = WorkerClientRelation::find()->where(['worker_id' => $id]);

        $query->joinWith('client.user');
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['clientUsername'] = [
          'asc' => ['user.username' => SORT_ASC],
          'desc' => ['user.username' => SORT_DESC],
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
            //'client_id' => $this->client_id,
            //'worker_id' => $this->worker_id,
        ]);

        $query->andFilterWhere(['like', 'user.username', $this->clientUsername]);

        return $dataProvider;
    }
}
