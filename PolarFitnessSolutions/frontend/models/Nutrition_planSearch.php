<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\nutrition_plan;

/**
 * nutrition_planSearch represents the model behind the search form of `frontend\models\nutrition_plan`.
 */
class nutrition_planSearch extends nutrition_plan
{
    public $clientUsername;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'client_id', 'worker_id'], 'integer'],
            [['clientUsername'], 'string'],
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
        $id = Yii::$app->user->id;

        if(Yii::$app->user->can('funcionario')){
            $query = nutrition_plan::find()->where(['worker_id' => $id]);

            $query->joinWith('client.user');
        }
        elseif (Yii::$app->user->can('utilizador')){
            $query = nutrition_plan::find()->where(['client_id' => $id]);

            $query->joinWith('worker.user');
        }


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
            'updated_at' => $this->updated_at,
        ]);



        $query->andFilterWhere(['like', 'nutritionname', $this->nutritionname])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'user.username', $this->clientUsername]);


        return $dataProvider;
    }
}
