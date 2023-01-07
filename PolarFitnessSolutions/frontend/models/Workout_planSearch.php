<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Workout_plan;

/**
 * Workout_planSearch represents the model behind the search form of `frontend\models\Workout_plan`.
 */
class Workout_planSearch extends Workout_plan
{
    public $clientUsername;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'client_id', 'worker_id'], 'integer'],
            [['clientUsername'], 'string'],
            [['workout_name'], 'safe'],
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
        $query = Workout_plan::find()->where(['worker_id' => $id]);

        $query->joinWith('client.user');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['clientUsername'] = [
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
            'created_at' => $this->created_at,
            'client_id' => $this->client_id,
            'worker_id' => $this->worker_id,
        ]);

        $query->andFilterWhere(['like', 'workout_name', $this->workout_name])
            ->andFilterWhere(['like', 'user.username', $this->clientUsername]);

        return $dataProvider;
    }
}
