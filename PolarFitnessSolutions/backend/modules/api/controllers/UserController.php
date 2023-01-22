<?php

namespace backend\modules\api\controllers;

use backend\modules\api\models\LoginForm;
use backend\modules\api\models\SignupForm;
use Yii;
use yii\rest\ActiveController;

/**
 * Default controller for the `api` module
 */
class UserController extends ActiveController
{
    public $modelClass = 'backend\models\User';

    public function actionLogin()
    {
        $success = "{\"success\":{\"valor\":\"yes\"}}";

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post(), '') && $model->login()) {

            return $model->getUser()->toArray(['id','username','email','street','zip_code','area','phone_number','nif','gender', 'subscription']);

        }
        Yii::$app->response->statusCode = 422;
        return [
            'errors'=> $model->errors
        ];
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post(),'') && $model->signup()) {
            return $model->_user;
        }
        Yii::$app->response->statusCode = 422;
        return [
            'errors' => $model->errors
        ];
    }
}
