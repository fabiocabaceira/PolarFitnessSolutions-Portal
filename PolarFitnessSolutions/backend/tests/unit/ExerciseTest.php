<?php

namespace backend\tests\unit;

use backend\tests\UnitTester;
use backend\models\Exercise;

class BookingTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function testCorrectExercise()
    {
        $model = new Exercise([
            'exercise_name' => 'exercise name example',
            'max_rep'=> '2',
            'min_rep'=> '2',
            'sets'=> '2',
        ]);

        verify($model->save())->true();
    }

    public function testFailExerciseNameTooLong(){
        $model = new Exercise([
            'exercise_name' => 'tooooooooooooooooooooooooooLoooooooooooooooooonnnnnnnnggggggggEeeeeexxxxxxeeeeeeeeerrrrciiiiiiseeeeNaaaaaaaaaaaammmmmmmmmmeeeeeeee',
            'max_rep'=> '2',
            'min_rep'=> '2',
            'sets'=> '2',
        ]);
        verify($model->save())->false();
    }
    public function testFailExerciseRepNotInt(){
        $model = new Exercise([
            'exercise_name' => 'exercise name',
            'max_rep'=> 'abc',
            'min_rep'=> '2',
            'sets'=> '2',
        ]);
        verify($model->save())->false();
    }

    public function testFailExerciseSetsNotInt(){
        $model = new Exercise([
            'exercise_name' => 'exercise name',
            'max_rep'=> '2',
            'min_rep'=> '2',
            'sets'=> 'abc',
        ]);
        verify($model->save())->false();
    }

}
