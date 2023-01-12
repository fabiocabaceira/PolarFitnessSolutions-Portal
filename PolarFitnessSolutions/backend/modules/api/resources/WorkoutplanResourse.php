<?php

namespace backend\modules\api\resources;

use backend\models\WorkoutPlan;

class WorkoutplanResourse extends WorkoutPlan
{
    public function fields()
    {
        return ['id','workout_name','created_at','updated_at','client_id','worker_id'];
    }
}