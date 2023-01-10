<?php

namespace backend\tests\unit;

use backend\tests\UnitTester;
use backend\models\WorkerClientRelation;

class WorkerClientRelationTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function testRelateClientWorker()
    {
        $model = new WorkerClientRelation([
            'client_id' => '2',
            'worker_id'=> '3',
        ]);

        verify($model->save())->true();
    }

    public function testFailToRelateEmptyClientWorker(){
        $model = new WorkerClientRelation([
            'client_id' => '',
            'worker_id'=> '3',
        ]);
        verify($model->save())->false();
    }

    public function testFailToRelateUnknownClientWorker(){
        $model = new WorkerClientRelation([
            'client_id' => '5',
            'worker_id'=> '3',
        ]);
        verify($model->save())->false();
    }

    public function testFailToRelateStringClientWorker(){
        $model = new WorkerClientRelation([
            'client_id' => 'abc',
            'worker_id'=> '3',
        ]);
        verify($model->save())->false();
    }

}
