<?php

namespace backend\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

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
class Exercise extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'exercise';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['exercise_name'], 'required'],
            [['max_rep', 'min_rep', 'sets'], 'integer'],
            [['max_rep', 'min_rep', 'sets'], 'required'],
            [['exercise_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
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
     * @return ActiveQuery
     */
    public function getWorkoutPlanExerciseRelations(): ActiveQuery
    {
        return $this->hasMany(WorkoutPlanExerciseRelation::class, ['exercise_id' => 'id']);
    }
}
