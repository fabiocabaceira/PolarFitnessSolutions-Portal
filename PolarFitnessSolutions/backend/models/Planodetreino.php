<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "planoDeTreino".
 *
 * @property int $id
 * @property string $nome
 * @property string|null $createdate
 * @property int|null $id_user
 * @property int|null $id_funcionario
 *
 * @property Funcionario $funcionario
 * @property User $user
 */
class Planodetreino extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'planoDeTreino';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['createdate'], 'safe'],
            [['id_user', 'id_funcionario'], 'integer'],
            [['nome'], 'string', 'max' => 30],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
            [['id_funcionario'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::class, 'targetAttribute' => ['id_funcionario' => 'id']],
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
            'createdate' => 'Createdate',
            'id_user' => 'Id User',
            'id_funcionario' => 'Id Funcionario',
        ];
    }

    /**
     * Gets query for [[Funcionario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionario()
    {
        return $this->hasOne(Funcionario::class, ['id' => 'id_funcionario']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}
