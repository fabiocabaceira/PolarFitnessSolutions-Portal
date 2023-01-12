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

    public function actionIndex()
    {

    }

    public function actionView($id)
    {
        $model = new Workoutplan();

        if ($model->load($this->request->post()) && $model->save()) {
            return $model->getWorkoutPlanApi()->toArray(['id','workout_name','client_id','worker_id']);
        }
        return null;
    }


    public function actionCreate()
    {
        $model = new WorkoutPlanForm();

        if ($model->load($this->request->post()) && $model->create()) {
            return $model->workout;
        }

        Yii::$app->response->statusCode = 422;
        return [
            'errors' => $model->errors
        ];
    }

    public function actionUpdate($id)
    {

    }


    public function actionDelete($id)
    {

    }

    protected function findModel($id)
    {
        if (($model = WorkoutPlan::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
