<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Planonutricional;

/**
 * PlanonutricionalSearch represents the model behind the search form of `app\models\Planonutricional`.
 */
class PlanonutricionalSearch extends Planonutricional
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_funcionario'], 'integer'],
            [['conteudo', 'createdate'], 'safe'],
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
        $query = Planonutricional::find();

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
            'id_user' => $this->id_user,
            'id_funcionario' => $this->id_funcionario,
        ]);

        $query->andFilterWhere(['like', 'conteudo', $this->conteudo]);

        return $dataProvider;
    }
}
