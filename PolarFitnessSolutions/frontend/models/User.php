<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $status
 * @property string|null $rua
 * @property string|null $codigo_postal
 * @property string|null $localidade
 * @property int|null $telefone
 * @property int|null $nif
 * @property string|null $genero
 * @property int|null $ginasio_id
 *
 * @property AvaliacaoFisica[] $avaliacaoFisicas
 * @property Funcionario[] $funcionarios
 * @property Ginasio $ginasio
 * @property Inscricao[] $inscricaos
 * @property Mensagem[] $mensagems
 * @property PlanoDeTreino[] $planoDeTreinos
 * @property PlanoNutricional[] $planoNutricionals
 * @property SessaoDeTreino[] $sessaoDeTreinos
 */
class User extends \common\models\User
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
     * Gets query for [[AvaliacaoFisicas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAvaliacaoFisicas()
    {
        return $this->hasMany(AvaliacaoFisica::class, ['id_user' => 'id']);
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
     * Gets query for [[Mensagems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMensagems()
    {
        return $this->hasMany(Mensagem::class, ['id_user' => 'id']);
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
