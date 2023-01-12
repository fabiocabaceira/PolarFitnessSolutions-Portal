<?php

namespace backend\modules\api\models;

use common\models\User;
use backend\models\Client;
use backend\modules\api\resources\UserResource;
use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $street;
    public $zip_code;
    public $area;
    public $phone_number;
    public $gender;
    public $password;
    public $nif;
    public $_user;
    public $status = 10;
    /**
     * {@inheritdoc}
     */ public function rules()
{
    return [
        ['username', 'trim'],
        ['username', 'required'],
        ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
        ['username', 'string', 'min' => 2, 'max' => 255],

        ['email', 'trim'],
        ['email', 'required'],
        ['email', 'email'],
        ['email', 'string', 'max' => 255],
        ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

        ['password', 'required'],
        ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

        ['street', 'required'],
        ['zip_code', 'required'],
        ['area', 'required'],
        ['phone_number', 'required'],
        ['nif', 'required'],
        ['gender', 'required'],

    ];
}


    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        $this->_user= new User();
        if (!$this->validate()) {
            return false;
        }

        $this->_user->username = $this->username;
        $this->_user->email = $this->email;
        $this->_user->street = $this->street;
        $this->_user->zip_code = $this->zip_code;
        $this->_user->phone_number = $this->phone_number;
        $this->_user->area = $this->area;
        $this->_user->nif = $this->nif;
        $this->_user->gender = $this->gender;
        $this->_user->setPassword($this->password);
        $this->_user->generateAuthKey();
        $this->_user->status = $this->status;
        $this->_user->generateEmailVerificationToken();
        $this->_user->save();

        $client = new Client();
        $client->client_id = $this->_user->id;
        $client->save();

        //assigning roles at sign up
        $auth = \Yii::$app->authManager;
        $utilizadorRole = $auth->getRole('utilizador');
        $auth->assign($utilizadorRole, $this->_user->getId());
        return true;
    }
}
