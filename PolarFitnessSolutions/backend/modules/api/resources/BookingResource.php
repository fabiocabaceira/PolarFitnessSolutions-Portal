<?php

namespace backend\modules\api\resources;
use backend\models\Booking;

class BookingResource
{
    public function fields(){
        return ['id', 'booking_date', 'user_id'];
    }

}