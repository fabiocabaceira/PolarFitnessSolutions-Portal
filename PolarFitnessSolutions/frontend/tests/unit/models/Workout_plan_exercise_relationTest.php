<?php

namespace frontend\tests\unit\models;

use common\fixtures\UserFixture;
use frontend\models\Exercise;
use frontend\models\Workout_plan;
use frontend\models\Workout_plan_exercise_relation;

class Workout_plan_exercise_relationTest extends \Codeception\Test\Unit
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

    public function testAddExerciseToWorkoutPlan(){

        $model = new Workout_plan([
            'workout_name' => 'Workout para relacao',
            'client_id' => '2',
        ]);
        verify($model->save())->true();

        $exercise = new Workout_plan_exercise_relation([
            'workout_plan_id' => $model->id,
            'exercise_id' => '1',
        ]);
        verify($exercise->save())->true();
        $exercise->delete();
        $model->delete();
    }

    public function testFailToAddEmptyExerciseToSpecificWorkoutPlan(){

        $model = new Workout_plan([
            'workout_name' => 'Workout para relacao',
            'client_id' => '2',
        ]);
        verify($model->save())->true();

        $exercise = new Workout_plan_exercise_relation([
            'workout_plan_id' => $model->id,
            'exercise_id' => '',
        ]);
        verify($exercise->save())->false();
        $exercise->delete();
        $model->delete();


    }


}
