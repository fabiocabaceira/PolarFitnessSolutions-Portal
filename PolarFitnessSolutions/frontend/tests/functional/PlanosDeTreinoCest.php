<?php

namespace frontend\tests\functional;

use common\models\User;
use frontend\tests\FunctionalTester;
use common\fixtures\UserFixture;
use frontend\models\Workout_plan;
/*
class PlanosDeTreinoCest
{
    /**
     * Load fixtures before db transaction begin
     * Called in _before()
     * @see \Codeception\Module\Yii2::_before()
     * @see \Codeception\Module\Yii2::loadFixtures()
     * @return array
     
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'login_data.php',
            ],
        ];
    }

    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('site/login');
    }

    protected function formParams($login, $password)
    {
        return [
            'LoginForm[username]' => $login,
            'LoginForm[password]' => $password,
        ];
    }

    public function checkEmpty(FunctionalTester $I)
    {
        $user = new User();
        $user->username = 'pedro';
        $user->email = 'sfriesen@jenkins.info';
        $user->street = 'Rua de Teste';
        $user->zip_code = '1234-123';
        $user->phone_number = '123456789';
        $user->area = 'Area Teste';
        $user->nif = '987654321';
        $user->gender = 'Outro';
        $user->status = 10;
        $user->setPassword('12345678');
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->save();

        $auth = \Yii::$app->authManager;
        $Role = $auth->getRole('utilizador');
        $auth->assign($Role, $user->getId());

        $client = \frontend\models\User::findOne($user->getId());
        $client->subscription = 'ativo';
        $client->save();

        $I->submitForm('#login-form', $this->formParams('pedro', '12345678'));
        $I->amOnRoute('workout_plan/index');
        $I->see('Criar Plano de Treino');
        $I->click('Criar Plano de Treino');
        $I->fillField('Nome', 'WorkoutPlan Name');
        $I->click('Guardar');
        $workoutPlan = Workout_plan::find()->where(['id'=>1])->one();
        $workoutPlan->client_id = $user->getId();
        $workoutPlan->save();
        //$I->click('Planos de Treino');
        //$I->amOnRoute('workout_plan/view?id=1');
        $I->seeInCurrentUrl('workout_plan/view?id=1');
        //$I->submitForm('#createWorkoutPlanClient', ['createWorkoutPlanClient[workout_name]']);
    }

   /* public function checkWrongPassword(FunctionalTester $I)
    {


        $I->submitForm('#login-form', $this->formParams('pedro', 'wrong'));
        $I->seeValidationError('Incorrect username or password.');
    }

    public function checkInactiveAccount(FunctionalTester $I)
    {
        $user = new User();
        $user->username = 'jose';
        $user->email = 'sfriesen@jenkins.info';
        $user->street = 'Rua de Teste';
        $user->zip_code = '1234-123';
        $user->phone_number = '123456789';
        $user->area = 'Area Teste';
        $user->nif = '987654321';
        $user->gender = 'Outro';
        $user->status = 9;
        $user->setPassword('12345678');
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->save();

        $auth = \Yii::$app->authManager;
        $Role = $auth->getRole('utilizador');
        $auth->assign($Role, $user->getId());

        $I->submitForm('#login-form', $this->formParams('jose', '12345678'));
        $I->seeValidationError('Incorrect username or password.');
    }

    public function checkValidLogin(FunctionalTester $I)
    {

        $user = new User();
        $user->username = 'pedro';
        $user->email = 'sfriesen@jenkins.info';
        $user->street = 'Rua de Teste';
        $user->zip_code = '1234-123';
        $user->phone_number = '123456789';
        $user->area = 'Area Teste';
        $user->nif = '987654321';
        $user->gender = 'Outro';
        $user->status = 10;
        $user->setPassword('12345678');
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->save();

        $auth = \Yii::$app->authManager;
        $Role = $auth->getRole('utilizador');
        $auth->assign($Role, $user->getId());

        $I->submitForm('#login-form', $this->formParams('pedro', '12345678'));
        $I->see('Logout (pedro)', 'form button[type=submit]');
        $I->dontSeeLink('Login');
        $I->dontSeeLink('Signup');
    }
}
*/