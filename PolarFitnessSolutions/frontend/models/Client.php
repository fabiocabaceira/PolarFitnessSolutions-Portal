<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "client".
 *
 * @property int $client_id
 *
 * @property User $client
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id'], 'required'],
            [['client_id'], 'integer'],
            [['client_id'], 'unique'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['client_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'client_id' => 'Client ID',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'client_id']);
    }


    public function getUsername(){
        $ClientUsername = self::find()->select(['id','username'])->all();
        return ArrayHelper::map($ClientUsername, 'id', 'username');
    }
}
