<?php

namespace backend\modules\api\controllers;

use backend\models\Physical_evaluation;
use backend\models\Physical_evaluationSearch;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * Physical_evaluationController implements the CRUD actions for Physical_evaluation model.
 */
class Physical_evaluationController extends ActiveController
{
    public $modelClass = 'backend\models\Physical_evaluation';
}