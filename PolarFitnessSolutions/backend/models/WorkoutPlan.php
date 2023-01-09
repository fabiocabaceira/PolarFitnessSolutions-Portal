<?php

namespace backend\models;

use Yii;

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
class WorkoutPlan extends \yii\db\ActiveRecord
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
            [['workout_name', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at', 'client_id', 'worker_id'], 'integer'],
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
}
