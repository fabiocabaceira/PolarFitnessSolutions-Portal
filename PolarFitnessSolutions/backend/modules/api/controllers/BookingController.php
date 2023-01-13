<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;
use Yii;

class BookingController extends ActiveController
{
    public $modelClass = 'backend\models\Booking';

}