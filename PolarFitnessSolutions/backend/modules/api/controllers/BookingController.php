<?php

namespace backend\modules\api\controllers;

use backend\models\Booking;
use backend\models\User;
use frontend\models\BookingSearch;
use backend\models\Client;
use yii\db\StaleObjectException;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * BookingController implements the CRUD actions for Booking model.
 */
class BookingController extends ActiveController
{
    public $modelClass = 'frontend\models\Booking';
}
