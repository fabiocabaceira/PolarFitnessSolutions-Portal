<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class HomeCest
{
    public function checkOpen(FunctionalTester $I)
    {
        $I->amOnRoute(\Yii::$app->homeUrl);
        $I->see('Criar conta');
        $I->seeLink('Login');
        $I->click('Login');
        $I->see('Seja bem-vindo');
    }
}