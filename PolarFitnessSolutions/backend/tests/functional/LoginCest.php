<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;
use common\models\User;

/**
 * Class LoginCest
 */
class LoginCest
{
    /**
     * Load fixtures before db transaction begin
     * Called in _before()
     * @see \Codeception\Module\Yii2::_before()
     * @see \Codeception\Module\Yii2::loadFixtures()
     * @return array
     */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ]
        ];
    }
    
    /**
     * @param FunctionalTester $I
     */
    public function loginUser(FunctionalTester $I)
    {
        /* criacao de um user */
        $user = new User();
        $user->username = 'erau';
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

        /* atribuicao do role de administrador ao utilizador */

        $auth = \Yii::$app->authManager;
        $Role = $auth->getRole('administrador');
        $auth->assign($Role, $user->getId());
        /* Teste ao login */

        $I->amOnRoute('/site/login');
        $I->fillField('Username', 'erau');
        $I->fillField('Password', '12345678');
        $I->click('Sign In');
        $I->seeInCurrentUrl('/index');

    }
}
