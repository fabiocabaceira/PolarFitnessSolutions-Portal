<?php

namespace frontend\modules\api\controllers;
use frontend\modules\api\models\LoginForm;
use frontend\modules\api\models\SignupForm;
use Yii;
use yii\rest\ActiveController;
class UserController extends activeController
{
    public $modelClass = 'common\models\Users';


    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post(),'') && $model->login()) {
            return $model->getUserApi()->toArray(['id','username','email','street','zip_code','area','phone_number','nif','gender']);
        }
Yii::$app->response->statusCode = 422;
        return [
            'errors' => $model->errors
        ];
    }


    public function actionSignup(){

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
