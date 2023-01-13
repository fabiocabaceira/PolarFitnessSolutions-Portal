<?php

namespace backend\controllers;

use backend\models\Exercise;
use backend\models\ExerciseSearch;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * ExerciseController implements the CRUD actions for Exercise model.
 */
class ExerciseController extends ActiveController
{
    public $modelClass = 'backend\models\Exercise';
}
