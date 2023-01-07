<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "workout_plan".
 *
 * @property int $id
 * @property string $workout_name
 * @property string|null $createdate
 * @property int|null $client_id
 * @property int|null $worker_id
 *
 * @property User $client
 * @property User $worker
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['workout_name'], 'required'],
            [['createdate'], 'safe'],
            [['user_id', 'worker_id'], 'integer'],
            [['workout_name'], 'string', 'max' => 30],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['client_id' => 'id']],
            [['worker_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['worker_id' => 'id']],
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
            'createdate' => 'Createdate',
            'client_id' => 'Client ID',
            'worker_id' => 'Worker ID',
        ];
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

    public function getClient()
    {
        return $this->hasOne(User::class, ['id' => 'client_id']);
    }
}
