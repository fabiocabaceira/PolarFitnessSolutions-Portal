<?php

namespace frontend\tests\unit\models;

use common\fixtures\UserFixture;
use frontend\models\Workout_plan;

class Workout_planTest extends \Codeception\Test\Unit
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

    public function testCreateWorkoutPlan(){

        $model = new Workout_plan([
            'workout_name' => 'Workout teste',
            'client_id' => '2',
        ]);

        verify($model->save())->true();
        $model->delete();

    }

    public function testFailToCreateWorkoutPlanWithNoExistingClient(){

        $model = new Workout_plan([
            'workout_name' => 'Workout client nao existente',
            'client_id' => '6',
        ]);

        verify($model->save())->false();
        $model->delete();
    }

    public function testCreateWorkoutPlanWithNoWorker(){

        $model = new Workout_plan([
            'workout_name' => 'Workout sem worker',
            'client_id' => '2',
            'worker_id' => '',
        ]);

        verify($model->save())->true();
        $model->delete();
    }

}
