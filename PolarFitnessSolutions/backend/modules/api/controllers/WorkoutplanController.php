<?php

namespace backend\modules\api\controllers;

use backend\modules\api\models\WorkoutPlanForm;
use Yii;
use backend\models\WorkoutPlan;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WorkoutplanController implements the CRUD actions for Workout_plan model.
 */
class WorkoutplanController extends ActiveController
{
    public $modelClass = 'frontend\models\Workout_plan';

}
