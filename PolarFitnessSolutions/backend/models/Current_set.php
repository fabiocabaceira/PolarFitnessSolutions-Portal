<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "current_set".
 *
 * @property int $id
 * @property int|null $reps
 * @property float|null $set_weight
 * @property int|null $exercise_id
 *
 * @property Exercise $exercise
 * @property WorkoutSession[] $workoutSessions
 */
class Current_set extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'current_set';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reps', 'exercise_id'], 'integer'],
            [['set_weight'], 'number'],
            [['exercise_id'], 'exist', 'skipOnError' => true, 'targetClass' => Exercise::class, 'targetAttribute' => ['exercise_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reps' => 'Reps',
            'set_weight' => 'Set Weight',
            'exercise_id' => 'Exercise ID',
        ];
    }

    /**
     * Gets query for [[Exercise]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExercise()
    {
        return $this->hasOne(Exercise::class, ['id' => 'exercise_id']);
    }

    /**
     * Gets query for [[WorkoutSessions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkoutSessions()
    {
        return $this->hasMany(WorkoutSession::class, ['set_id' => 'id']);
    }
}
