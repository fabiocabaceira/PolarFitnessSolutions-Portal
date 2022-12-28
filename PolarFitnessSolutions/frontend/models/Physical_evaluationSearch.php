<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Physical_evaluation;

/**
 * Physical_evaluationSearch represents the model behind the search form of `frontend\models\Physical_evaluation`.
 */
class Physical_evaluationSearch extends Physical_evaluation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fc_repouso', 'fc_maximo', 'user_id', 'worker_id'], 'integer'],
            [['imc', 'peso', 'massa_magra', 'massa_gorda_ideal', 'massa_gorda_normal', 'altura', 'massa_gorda', 'peso_corporal', 'excesso_de_peso', 'percentagem_de_gordura'], 'number'],
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
        $query = Physical_evaluation::find();

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
            'imc' => $this->imc,
            'fc_repouso' => $this->fc_repouso,
            'peso' => $this->peso,
            'massa_magra' => $this->massa_magra,
            'massa_gorda_ideal' => $this->massa_gorda_ideal,
            'massa_gorda_normal' => $this->massa_gorda_normal,
            'fc_maximo' => $this->fc_maximo,
            'altura' => $this->altura,
            'massa_gorda' => $this->massa_gorda,
            'peso_corporal' => $this->peso_corporal,
            'excesso_de_peso' => $this->excesso_de_peso,
            'percentagem_de_gordura' => $this->percentagem_de_gordura,
            'user_id' => $this->user_id,
            'worker_id' => $this->worker_id,
        ]);

        return $dataProvider;
    }
}
