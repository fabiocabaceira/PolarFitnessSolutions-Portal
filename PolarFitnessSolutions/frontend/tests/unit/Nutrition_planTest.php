<?php


namespace frontend\tests\Unit;

use frontend\tests\UnitTester;
use frontend\models\Nutrition_Plan;

class Nutrition_planTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {

    }

    // tests
    public function testCorrectNutrition_plan()
    {
        $model = new Nutrition_Plan([
            'nutritionname' => 'some_nutritionname',
            'content' => 'some long string',
            'client_id'=> 2,
            'worker_id'=> 3,
        ]);

        $plan = $model->attributes();
        verify($plan)->notEmpty();
    }

    public function testFailNutrition_planNoClient(){
        $model = new Nutrition_Plan([
            'nutritionname' => 'nutritionnametest example',
            'content'=> 'some long text with nutrition details',

            'worker_id'=>3,
        ]);
        verify($model->save())->false();
    }
}
