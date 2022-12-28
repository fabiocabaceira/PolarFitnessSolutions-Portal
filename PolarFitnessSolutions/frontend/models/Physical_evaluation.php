<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "physical_evaluation".
 *
 * @property int $id
 * @property float|null $imc
 * @property int|null $fc_repouso
 * @property float|null $peso
 * @property float|null $massa_magra
 * @property float|null $massa_gorda_ideal
 * @property float|null $massa_gorda_normal
 * @property int|null $fc_maximo
 * @property float|null $altura
 * @property float|null $massa_gorda
 * @property float|null $peso_corporal
 * @property float|null $excesso_de_peso
 * @property float|null $percentagem_de_gordura
 * @property int|null $user_id
 * @property int|null $worker_id
 *
 * @property User $user
 * @property User $worker
 */
class Physical_evaluation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'physical_evaluation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imc', 'peso', 'massa_magra', 'massa_gorda_ideal', 'massa_gorda_normal', 'altura', 'massa_gorda', 'peso_corporal', 'excesso_de_peso', 'percentagem_de_gordura'], 'number'],
            [['fc_repouso', 'fc_maximo', 'user_id', 'worker_id'], 'integer'],
            [['worker_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['worker_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'imc' => 'Imc',
            'fc_repouso' => 'Fc Repouso',
            'peso' => 'Peso',
            'massa_magra' => 'Massa Magra',
            'massa_gorda_ideal' => 'Massa Gorda Ideal',
            'massa_gorda_normal' => 'Massa Gorda Normal',
            'fc_maximo' => 'Fc Maximo',
            'altura' => 'Altura',
            'massa_gorda' => 'Massa Gorda',
            'peso_corporal' => 'Peso Corporal',
            'excesso_de_peso' => 'Excesso De Peso',
            'percentagem_de_gordura' => 'Percentagem De Gordura',
            'user_id' => 'User ID',
            'worker_id' => 'Worker ID',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Worker]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorker()
    {
        return $this->hasOne(User::class, ['id' => 'worker_id']);
    }
}
