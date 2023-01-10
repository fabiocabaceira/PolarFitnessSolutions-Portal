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
        ]);

        verify($model->save())->true();

    }

    public function testFailToCreateWorkoutPlanWithNoExistingClient(){

        $model = new Workout_plan([
            'workout_name' => 'Um Workout',
            'client_id' => '6',
        ]);

        verify($model->save())->false();
    }

    public function testCreateWorkoutPlanWithNoWorker(){

        $model = new Workout_plan([
            'workout_name' => 'Workout teste',
            'worker_id' => '',
        ]);

        verify($model->save())->true();

    }


}
