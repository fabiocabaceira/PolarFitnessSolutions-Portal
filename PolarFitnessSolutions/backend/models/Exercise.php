<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "exercise".
 *
 * @property int $id
 * @property string $exercise_name
 * @property int|null $max_rep
 * @property int|null $min_rep
 * @property int|null $sets
 *
 * @property WorkoutPlanExerciseRelation[] $workoutPlanExerciseRelations
 */
class Exercise extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exercise';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['exercise_name'], 'required'],
            [['max_rep', 'min_rep', 'sets'], 'integer'],
            [['exercise_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'exercise_name' => 'Exercise Name',
            'max_rep' => 'Max Rep',
            'min_rep' => 'Min Rep',
            'sets' => 'Sets',
        ];
    }

    /**
     * Gets query for [[WorkoutPlanExerciseRelations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkoutPlanExerciseRelations()
    {
        return $this->hasMany(WorkoutPlanExerciseRelation::class, ['exercise_id' => 'id']);
    }
}
