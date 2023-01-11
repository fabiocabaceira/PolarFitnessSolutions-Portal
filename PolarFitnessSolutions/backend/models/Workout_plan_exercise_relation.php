<?php

namespace backend\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "workout_plan_exercise_relation".
 *
 * @property int $id
 * @property int|null $workout_plan_id
 * @property int|null $exercise_id
 *
 * @property Exercise $exercise
 * @property WorkoutPlan $workoutPlan
 */
class Workout_plan_exercise_relation extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'workout_plan_exercise_relation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['workout_plan_id', 'exercise_id'], 'integer'],
            [['workout_plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => WorkoutPlan::class, 'targetAttribute' => ['workout_plan_id' => 'id']],
            [['exercise_id'], 'exist', 'skipOnError' => true, 'targetClass' => Exercise::class, 'targetAttribute' => ['exercise_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'workout_plan_id' => 'Workout Plan ID',
            'exercise_id' => 'Exercise ID',
        ];
    }

    /**
     * Gets query for [[Exercise]].
     *
     * @return ActiveQuery
     */
    public function getExercise(): ActiveQuery
    {
        return $this->hasOne(Exercise::class, ['id' => 'exercise_id']);
    }

    /**
     * Gets query for [[WorkoutPlan]].
     *
     * @return ActiveQuery
     */
    public function getWorkoutPlan(): ActiveQuery
    {
        return $this->hasOne(WorkoutPlan::class, ['id' => 'workout_plan_id']);
    }
}
