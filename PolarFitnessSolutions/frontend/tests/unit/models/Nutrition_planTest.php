<?php


namespace frontend\tests\unit\models;

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

    public function testFailNutrition_planNoExistingClient(){
        $model = new Nutrition_Plan([
            'nutritionname' => 'nutritionnametest example',
            'content'=> 'some long text with nutrition details',
            'client_id' => '10',
            'worker_id'=>'3',
        ]);
        verify($model->save())->false();
    }

    public function testFailNutrition_planNoExistingWorker(){
        $model = new Nutrition_Plan([
            'nutritionname' => 'nutritionnametest example',
            'content'=> 'some long text with nutrition details',
            'client_id' => '2',
            'worker_id'=>'10',
        ]);
        verify($model->save())->false();
    }
}
