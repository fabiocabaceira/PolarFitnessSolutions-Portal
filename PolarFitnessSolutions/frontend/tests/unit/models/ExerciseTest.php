<?php

namespace frontend\tests\unit\models;

use common\fixtures\UserFixture;
use frontend\models\Exercise;
use frontend\models\Workout_plan;
use frontend\models\Workout_plan_exercise_relation;

class ExerciseTest extends \Codeception\Test\Unit
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

    public function testAddNewExercise(){

        $model = new Exercise([
            'exercise_name' => 'Workout para relacao',
            'max_rep' => '15',
            'min_rep' => '2',
            'sets' => '5',
        ]);
        verify($model->save())->true();
        $model->delete();
    }


}
