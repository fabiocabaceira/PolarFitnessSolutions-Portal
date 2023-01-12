<?php

namespace frontend\modules\api\resources;

use frontend\models\Workout_plan;

class WorkoutplanResourse extends Workout_plan
{
    public function fields()
    {
        return ['id','workout_name','created_at','updated_at','client_id','worker_id'];
    }
}