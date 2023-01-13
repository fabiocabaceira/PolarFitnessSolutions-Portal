<?php

namespace backend\modules\api\controllers;

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
    public $modelClass = 'backend\models\WorkoutPlan';

}
