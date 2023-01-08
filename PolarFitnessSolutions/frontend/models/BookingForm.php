<?php

namespace frontend\models;

use common\models\User;
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
        $model = new \frontend\models\BookingForm();
        $model->load(\Yii::$app->request->post());
        if (!$this->validate()) {
            return null;
        }
        $check = Booking::find()->where(['user_id' => \Yii::$app->user->id]);
        if ($check){
            return false;
        }
        $booking = new Booking();
        $booking->booking_date = $this->booking_date;
        $booking->user_id = \Yii::$app->user->id;
        $booking->save();

        return true;
    }


}