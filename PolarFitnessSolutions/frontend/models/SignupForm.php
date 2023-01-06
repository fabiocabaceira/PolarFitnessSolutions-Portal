<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup forms
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

    /**
     * {@inheritdoc}
     */
    public function rules()
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
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Nome',
            'email' => 'Email',
            'street' => 'Rua',
            'zip_code' => 'Código Postal',
            'area' => 'Localidade',
            'phone_number' => 'Número de telefone',
            'nif' => 'Nif',
            'gender' => 'Género',
        ];
    }
    
    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->street = $this->street;
        $user->zip_code = $this->zip_code;
        $user->phone_number = $this->phone_number;
        $user->area = $this->area;
        $user->nif = $this->nif;
        $user->gender = $this->gender;
        $user->status = 10;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->save();

        $client = new Client();
        $client->client_id = $user->id;
        $client->save();

        //assigning roles at sign up
        $auth = \Yii::$app->authManager;
        $utilizadorRole = $auth->getRole('utilizador');
        $auth->assign($utilizadorRole, $user->getId());
        return $this->sendEmail($user);
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
