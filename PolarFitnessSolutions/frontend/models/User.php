<?php

namespace frontend\models;

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
 * @property string|null $verification_token
 * @property int $status
 * @property string $rua
 * @property string $codigo_postal
 * @property string $localidade
 * @property int $telefone
 * @property int $nif
 * @property string|null $genero
 * @property int $role
 *
 * @property AvaliacaoFisica[] $avaliacaoFisicas
 * @property AvaliacaoFisica[] $avaliacaoFisicas0
 * @property Inscricao[] $inscricaos
 * @property Mensagem[] $mensagems
 * @property Mensagem[] $mensagems0
 * @property PlanoDeTreino[] $planoDeTreinos
 * @property PlanoDeTreino[] $planoDeTreinos0
 * @property PlanoNutricional[] $planoNutricionals
 * @property PlanoNutricional[] $planoNutricionals0
 * @property SalaDeExercicio[] $salaDeExercicios
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
            [['username', 'password_hash', 'email', 'auth_key', 'created_at', 'updated_at', 'rua', 'codigo_postal', 'localidade', 'telefone', 'nif', 'role'], 'required'],
            [['created_at', 'updated_at', 'status', 'telefone', 'nif', 'role'], 'integer'],
            [['genero'], 'string'],
            [['username', 'localidade'], 'string', 'max' => 50],
            [['password_hash', 'password_reset_token', 'verification_token'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 70],
            [['auth_key'], 'string', 'max' => 32],
            [['rua'], 'string', 'max' => 200],
            [['codigo_postal'], 'string', 'max' => 8],
            [['password_reset_token'], 'unique'],
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
            'role' => 'Role',
        ];
    }

    /**
     * Gets query for [[AvaliacaoFisicas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAvaliacaoFisicas()
    {
        return $this->hasMany(AvaliacaoFisica::class, ['id_funcionario' => 'id']);
    }

    /**
     * Gets query for [[AvaliacaoFisicas0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAvaliacaoFisicas0()
    {
        return $this->hasMany(AvaliacaoFisica::class, ['id_user' => 'id']);
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
     * Gets query for [[Mensagems0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMensagems0()
    {
        return $this->hasMany(Mensagem::class, ['id_funcionario' => 'id']);
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
     * Gets query for [[PlanoDeTreinos0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanoDeTreinos0()
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
        return $this->hasMany(PlanoNutricional::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[PlanoNutricionals0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanoNutricionals0()
    {
        return $this->hasMany(PlanoNutricional::class, ['id_funcionario' => 'id']);
    }

    /**
     * Gets query for [[SalaDeExercicios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSalaDeExercicios()
    {
        return $this->hasMany(SalaDeExercicio::class, ['user_id' => 'id']);
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
