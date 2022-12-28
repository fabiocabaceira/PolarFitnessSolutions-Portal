<?php

namespace frontend\models;

use yii\db\ActiveRecord;

/**
 * User model
 *
 * @property integer $booking_date

 */

class Booking extends ActiveRecord
{

    /**
     * @return int
     */
    public function getBookingDate(): int
    {
        return $this->booking_date;
    }

    /**
     * @param int $booking_date
     */
    public function setBookingDate(int $booking_date): void
    {
        $this->booking_date = $booking_date;
    }
}