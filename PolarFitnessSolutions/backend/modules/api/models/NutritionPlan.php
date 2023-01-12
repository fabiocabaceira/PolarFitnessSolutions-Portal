<?php

namespace backend\modules\api\models;
use backend\modules\api\resources\NutritionPlanResource;
use yii\behaviors\TimestampBehavior;
use \backend\models\Nutrition_plan;

class NutritionPlan extends Nutrition_plan
{
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    private $_nutritionplan;

    public function getNutrionPlanApi(): ?NutritionPlanResource{
        if ($this->_nutritionplan===null){
            $this->_nutritionplan = NutritionPlanResource::find();
        }

        return $this->_nutritionplan;
    }

}