<?php

namespace frontend\models;

use common\models\User;
use yii\base\Model;

class BookingForm extends Model
{
    public $booking_date;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

        ];
    }

    public function booking()
    {
        if (!$this->validate()) {
            return null;
        }

        $booking = new Booking();
        $booking->booking_date = $this->booking_date;
        $booking->save();
    }
}