<?php

namespace frontend\tests\functional;

use common\models\User;
use frontend\models\Booking;
use frontend\tests\FunctionalTester;

class BookingCest
{

    public function CreateViewAndDeleteBooking(FunctionalTester $I){
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
        /* atribuicao do role de funcionario ao utilizador */

        $auth = \Yii::$app->authManager;
        $Role = $auth->getRole('utilizador');
        $auth->assign($Role, $user->getId());

        $I->amOnRoute('/site/login');
        $I->fillField('Username', 'erau');
        $I->fillField('Password', '12345678');
        $I->click('Sign In');
        $I->seeInCurrentUrl('/index');
        $I->click('Visualizar Inscricao');
        $I->see('Tem de marcar uma inscricao primeiro');
        $I->seeLink('Inscreva-se');
        $I->click('Inscreva-se');
        $I->seeInCurrentUrl('site/booking');
        $I->see('Marcar Inscrição');
        $I->fillField('Booking Date', '2023-01-03 14:00');
        $I->click('Marcar');
        $I->see('Inscricao marcada com sucesso');
        $I->seeInCurrentUrl('index');
        $I->seeLink('Visualizar Inscricao');
        $I->click('Visualizar Inscricao');
        $I->see('2023-01-03 14:00');
        $I->click('Apagar');
        $I->seeInCurrentUrl('index');
        $I->click('Visualizar Inscricao');
        $I->see('Tem de marcar uma inscricao primeiro');
    }

}
