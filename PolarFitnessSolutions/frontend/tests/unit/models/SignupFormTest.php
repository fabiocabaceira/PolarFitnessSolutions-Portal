<?php

namespace frontend\tests\unit\models;

use common\fixtures\UserFixture;
use common\models\AuthAssignment;
use frontend\models\SignupForm;

class SignupFormTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;


    public function _before()
    {
        $this->tester->haveFixtures([
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ]);
    }

    public function testCorrectSignup()
    {
        $model = new SignupForm([

            'username' => 'some_username',
            'email' => 'some_email@example.com',
            'password' => 'some_password',
            'street' => 'Rua de Teste',
            'zip_code' => '1234-123',
            'area' => 'Area Teste',
            'phone_number' => '123456789',
            'nif' => '987654321',
            'gender' => 'Outro',
        ]);

        $user = $model->signup();
        verify($user)->notEmpty();

        /** @var \common\models\User $user */
        $user = $this->tester->grabRecord('common\models\User', [
            'username' => 'some_username',
            'email' => 'some_email@example.com',
            'street' => 'Rua de Teste',
            'zip_code' => '1234-123',
            'area' => 'Area Teste',
            'phone_number' => '123456789',
            'nif' => '987654321',
            'gender' => 'Outro',
            'status' => \common\models\User::STATUS_ACTIVE
        ]);
    }

    public function testNotCorrectSignup()
    {
        $model = new SignupForm([
            'username' => 'troy.becker',
            'email' => 'nicolas.dianna@hotmail.com',
            'password' => 'some_password',
            'street' => 'Rua de Teste',
            'zip_code' => '1234-123',
            'area' => 'Area Teste',
            'phone_number' => '123456789',
            'nif' => '987654321',
            'gender' => 'Outro',
        ]);

        verify($model->signup())->empty();
        verify($model->getErrors('username'))->notEmpty();
        verify($model->getErrors('email'))->notEmpty();

        verify($model->getFirstError('username'))
            ->equals('This username has already been taken.');
        verify($model->getFirstError('email'))
            ->equals('This email address has already been taken.');
        $authass = AuthAssignment::find()->where(['user_id' => '5'])->one();
        $authass->delete();
    }
}