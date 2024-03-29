<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "nutrition_plan".
 *
 * @property int $id
 * @property string $nutritionname
 * @property string $content
 * @property int $created_at
 * @property int $updated_at
 * @property int|null $client_id
 * @property int|null $worker_id
 *
 * @property Client $client
 * @property Worker $worker
 */
class Nutrition_plan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nutrition_plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nutritionname', 'content'], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at', 'client_id', 'worker_id'], 'integer'],
            [['nutritionname'], 'string', 'max' => 30],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::class, 'targetAttribute' => ['client_id' => 'client_id']],
            [['worker_id'], 'exist', 'skipOnError' => true, 'targetClass' => Worker::class, 'targetAttribute' => ['worker_id' => 'worker_id']],
        ];
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nutritionname' => 'Nutritionname',
            'content' => 'Content',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'client_id' => 'Client ID',
            'worker_id' => 'Worker ID',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::class, ['client_id' => 'client_id']);
    }

    /**
     * Gets query for [[Worker]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorker()
    {
        return $this->hasOne(Worker::class, ['worker_id' => 'worker_id']);
    }
    public function mqttPublish(){
        $server   = '127.0.0.1';
        $port = 1883;
        $id_do_cliente = $this->client_id;
        $nome_do_cliente = $this->client->user->username;
        $nome_do_plano_de_nutricao = $this->nutritionname;
        $payload = '{"id_do_cliente":"'.$id_do_cliente.'", "nome_do_cliente":"'.$nome_do_cliente.'", "nome_do_plano_de_nutricao":"'.$nome_do_plano_de_nutricao.'"}';
        $mqtt = new \PhpMqtt\Client\MqttClient($server, $port);
        $mqtt->connect();
        $mqtt->publish("Planos de nutricao/".$id_do_cliente."/", $payload, 0, true);
        $mqtt->disconnect();

    }
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
        $this->mqttPublish();
    }
}

