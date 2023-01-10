<?php

namespace backend\tests\unit;

use common\fixtures\UserFixture;
use backend\tests\UnitTester;
use backend\models\Booking;

class BookingTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
        $this->tester->haveFixtures([
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ]);

    }

    // tests
    public function testCorrectBooking()
    {
        $model = new Booking([
            'booking_date' => '2023-01-25 14:30:00',
            'user_id'=> '2',
        ]);

        verify($model->save())->true();
    }

    public function testFailBookingNoExistingUser(){
        $model = new Booking([
            'booking_date' => '2023-01-25 14:30:00',
            'user_id'=> '25',
        ]);
        verify($model->save())->false();
    }

}
