<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password_hash
 * @property string $email
 * @property string $auth_key
 * @property string|null $password_reset_token
 * @property int $created_at
 * @property int $updated_at
 * @property string $verification_token
 * @property int $status
 * @property string|null $rua
 * @property string|null $codigo_postal
 * @property string|null $localidade
 * @property int|null $telefone
 * @property int|null $nif
 * @property string|null $genero
 * @property int|null $ginasio_id
 *
 * @property AvaliacoesFisicas[] $avaliacoesFisicas
 * @property Funcionario[] $funcionarios
 * @property Ginasio $ginasio
 * @property Inscricao[] $inscricaos
 * @property Mensagens[] $mensagens
 * @property PlanoDeTreino[] $planoDeTreinos
 * @property PlanoNutricional[] $planoNutricionals
 * @property SessaoDeTreino[] $sessaoDeTreinos
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'email', 'auth_key', 'created_at', 'updated_at', 'verification_token'], 'required'],
            [['created_at', 'updated_at', 'status', 'telefone', 'nif', 'ginasio_id'], 'integer'],
            [['genero'], 'string'],
            [['username', 'localidade'], 'string', 'max' => 50],
            [['password_hash', 'password_reset_token', 'verification_token'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 70],
            [['auth_key'], 'string', 'max' => 32],
            [['rua'], 'string', 'max' => 200],
            [['codigo_postal'], 'string', 'max' => 5],
            [['password_reset_token'], 'unique'],
            [['ginasio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ginasio::class, 'targetAttribute' => ['ginasio_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
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
            'ginasio_id' => 'Ginasio ID',
        ];
    }

    /**
     * Gets query for [[AvaliacoesFisicas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAvaliacoesFisicas()
    {
        return $this->hasMany(AvaliacoesFisicas::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Funcionarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionarios()
    {
        return $this->hasMany(Funcionario::class, ['cliente_id' => 'id']);
    }

    /**
     * Gets query for [[Ginasio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGinasio()
    {
        return $this->hasOne(Ginasio::class, ['id' => 'ginasio_id']);
    }

    /**
     * Gets query for [[Inscricaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInscricaos()
    {
        return $this->hasMany(Inscricao::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Mensagens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMensagens()
    {
        return $this->hasMany(Mensagens::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[PlanoDeTreinos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanoDeTreinos()
    {
        return $this->hasMany(PlanoDeTreino::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[PlanoNutricionals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanoNutricionals()
    {
        return $this->hasMany(PlanoNutricional::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[SessaoDeTreinos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSessaoDeTreinos()
    {
        return $this->hasMany(SessaoDeTreino::class, ['id_user' => 'id']);
    }
}
