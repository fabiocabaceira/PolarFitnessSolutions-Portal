<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "workout_plan".
 *
 * @property int $id
 * @property string $workout_name
 * @property int $created_at
 * @property int $updated_at
 * @property int|null $client_id
 * @property int|null $worker_id
 *
 * @property Client $client
 * @property Worker $worker
 * @property WorkoutPlanExerciseRelation[] $workoutPlanExerciseRelations
 */
class Workout_plan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workout_plan';
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
    public function rules()
    {
        return [
            [['workout_name'], 'required'],
            [['client_id'], 'required'],
            [['created_at', 'client_id', 'worker_id', 'updated_at'], 'integer'],
            [['workout_name'], 'string', 'max' => 30],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::class, 'targetAttribute' => ['client_id' => 'client_id']],
            [['worker_id'], 'exist', 'skipOnError' => true, 'targetClass' => Worker::class, 'targetAttribute' => ['worker_id' => 'worker_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'workout_name' => 'Workout Name',
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

    /**
     * Gets query for [[WorkoutPlanExerciseRelations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkoutPlanExerciseRelations()
    {
        return $this->hasMany(WorkoutPlanExerciseRelation::class, ['workout_plan_id' => 'id']);
    }

    public function mqttPublish(){
        $server   = '127.0.0.1';
        $port = 1883;
        $id_do_cliente = $this->client_id;
        $nome_do_cliente = $this->client->user->username;
        $nome_do_plano_de_treino = $this->workout_name;
        //$payload = "\r\nId do cliente: ".$id_do_cliente . "\r\nnome do cliente: ". $nome_do_cliente . "\r\nnome do plano de treino: " . $nome_do_plano_de_treino;
        $payload = '{"id_do_cliente":"'.$id_do_cliente.'", "nome_do_cliente":"'.$nome_do_cliente.'", "nome_do_plano_de_treino":"'.$nome_do_plano_de_treino.'"}';
        $mqtt = new \PhpMqtt\Client\MqttClient($server, $port);
        $mqtt->connect();
        $mqtt->publish("Planos de treino/".$id_do_cliente."/", $payload, 0, true);
        $mqtt->disconnect();
    }

}
