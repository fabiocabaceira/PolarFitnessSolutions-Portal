<?php

namespace backend\modules\api\controllers;


use backend\modules\api\models\NutritionPlan;
use backend\modules\api\models\NutritionPlanForm;
use yii\rest\ActiveController;
use Yii;

class Nutrition_planController extends ActiveController
{
    public $modelClass = 'backend\models\Nutrition_plan';

}