<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;

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
    public static function tableName(): string
    {
        return 'workout_plan';
    }

    public function behaviors(): array
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['workout_name'], 'required'],
            [['created_at', 'updated_at', 'client_id', 'worker_id'], 'integer'],
            [['workout_name'], 'string', 'max' => 30],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::class, 'targetAttribute' => ['client_id' => 'client_id']],
            [['worker_id'], 'exist', 'skipOnError' => true, 'targetClass' => Worker::class, 'targetAttribute' => ['worker_id' => 'worker_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
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
     * @return ActiveQuery
     */
    public function getClient(): ActiveQuery
    {
        return $this->hasOne(Client::class, ['client_id' => 'client_id']);
    }

    /**
     * Gets query for [[Worker]].
     *
     * @return ActiveQuery
     */
    public function getWorker(): ActiveQuery
    {
        return $this->hasOne(Worker::class, ['worker_id' => 'worker_id']);
    }

    /**
     * Gets query for [[WorkoutPlanExerciseRelations]].
     *
     * @return ActiveQuery
     */
    public function getWorkoutPlanExerciseRelations(): ActiveQuery
    {
        return $this->hasMany(WorkoutPlanExerciseRelation::class, ['workout_plan_id' => 'id']);
    }
}
