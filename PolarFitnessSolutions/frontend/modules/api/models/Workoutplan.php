<?php

namespace frontend\modules\api\models;

use frontend\models\Workout_plan;
use frontend\modules\api\resources\UserResource;
use frontend\modules\api\resources\WorkoutplanResourse;
use Yii;
use yii\behaviors\TimestampBehavior;


class Workoutplan extends Workout_plan
{
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    private $_workoutplan;

    public function getWorkoutPlanApi(): ?WorkoutplanResourse
    {
        if ($this->_workoutplan === null) {
            $this->_workoutplan = WorkoutplanResourse::find();
        }

        return $this->_workoutplan;
    }
}