<?php

namespace backend\modules\api\resources;

use backend\models\Nutrition_plan;

class NutritionPlanResource extends Nutrition_plan
{
    public function fields(){
        return ['id', 'nutritionname', 'content','created_at','updated_at','client_id','worker_id'];
    }

}