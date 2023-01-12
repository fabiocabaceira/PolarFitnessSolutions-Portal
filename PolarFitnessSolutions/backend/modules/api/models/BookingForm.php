<?php

namespace backend\modules\api\models;

use frontend\models\User;
use frontend\models\Booking;
use Yii;
use yii\base\Model;

class BookingForm extends Model
{
    public $booking_date;
    public $user_id;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['booking_date'], 'required'],
            [['booking_date'], 'safe'],
            ['booking_date', 'unique', 'targetClass' => '\frontend\models\Booking', 'message' => 'Esta data ja esta preenchida'],
        ];
    }
    /**
     * Booking
     *
     * @return bool whether the creating new account was successful
     */
    public function booking()
    {
        $check = Booking::find()->where(['user_id' => \Yii::$app->user->id])->one();
        $model = new \frontend\models\BookingForm();
        $model->load(\Yii::$app->request->post());
        if (!$this->validate()) {
            return null;
        }
        else if ($check){
            return null;
        }

        $booking = new Booking();
        $booking->booking_date = $this->booking_date;
        $booking->user_id = \Yii::$app->user->id;
        $booking->save();

        return true;
    }
}