<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "funcionario".
 *
 * @property int $id
 * @property string $nome
 * @property string $password_hash
 * @property string $email
 * @property string $auth_key
 * @property string|null $password_reset_token
 * @property int $created_at
 * @property int $updated_at
 * @property string $verification_token
 * @property int $status
 * @property string $rua
 * @property string $codigo_postal
 * @property string $localidade
 * @property int $telefone
 * @property int $nif
 * @property string $genero
 * @property int|null $cliente_id
 *
 * @property AvaliacoesFisicas[] $avaliacoesFisicas
 * @property User $cliente
 * @property Mensagens[] $mensagens
 * @property PlanoDeTreino[] $planoDeTreinos
 * @property PlanoNutricional[] $planoNutricionals
 */
class Funcionario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'funcionario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'password_hash', 'email', 'auth_key', 'created_at', 'updated_at', 'verification_token', 'rua', 'codigo_postal', 'localidade', 'telefone', 'nif', 'genero'], 'required'],
            [['created_at', 'updated_at', 'status', 'telefone', 'nif', 'cliente_id'], 'integer'],
            [['genero'], 'string'],
            [['nome', 'localidade'], 'string', 'max' => 50],
            [['password_hash', 'password_reset_token', 'verification_token'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 70],
            [['auth_key'], 'string', 'max' => 32],
            [['rua'], 'string', 'max' => 200],
            [['codigo_postal'], 'string', 'max' => 5],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['cliente_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'password_hash' => 'Password Hash',
            'email' => 'Email',
            'auth_key' => 'Auth Key',
            'password_reset_token' => 'Password Reset Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
            'status' => 'Status',
            'rua' => 'Rua',
            'codigo_postal' => 'Codigo Postal',
            'localidade' => 'Localidade',
            'telefone' => 'Telefone',
            'nif' => 'Nif',
            'genero' => 'Genero',
            'cliente_id' => 'Cliente ID',
        ];
    }

    /**
     * Gets query for [[AvaliacoesFisicas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAvaliacoesFisicas()
    {
        return $this->hasMany(AvaliacoesFisicas::class, ['id_funcionario' => 'id']);
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(User::class, ['id' => 'cliente_id']);
    }

    /**
     * Gets query for [[Mensagens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMensagens()
    {
        return $this->hasMany(Mensagens::class, ['id_funcionario' => 'id']);
    }

    /**
     * Gets query for [[PlanoDeTreinos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanoDeTreinos()
    {
        return $this->hasMany(PlanoDeTreino::class, ['id_funcionario' => 'id']);
    }

    /**
     * Gets query for [[PlanoNutricionals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanoNutricionals()
    {
        return $this->hasMany(PlanoNutricional::class, ['id_funcionario' => 'id']);
    }
}
