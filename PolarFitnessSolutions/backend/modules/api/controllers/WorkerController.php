<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;
use Yii;

class WorkerController extends ActiveController
{
    public $modelClass = 'backend\models\Worker';

}