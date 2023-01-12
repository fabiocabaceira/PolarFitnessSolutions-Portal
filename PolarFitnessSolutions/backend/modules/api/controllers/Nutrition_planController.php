<?php

namespace backend\modules\api\controllers;


use backend\modules\api\models\NutritionPlan;
use backend\modules\api\models\NutritionPlanForm;
use yii\rest\ActiveController;
use Yii;

class Nutrition_planController extends ActiveController
{
    public $modelClass = 'backend\models\Nutrition_plan';

    public function actionIndex()
    {
        $model = NutritionPlan::find();
        return $model;
    }

    public function actionView($id)
    {
        $model = NutritionPlan::findOne($id);
        if ($model== null){
            return $model->errors;
        }
        return $model;
    }

    public function actionCreate(){
        $model = new NutritionPlanForm();

       if ($model->load($this->request->post()) && $model->create()){
           return $model->nutrtionplan;
       }

       Yii::$app->response->statusCode = 422;
       return [
           'errors' => $model->errors
       ];
    }

    public function actionUpdate($id)
    {

        $model = new NutritionPlanForm();

        if($model->load($this->request->post()) && $model)

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


}