<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "physical_evaluation_booking".
 *
 * @property int $id
 * @property string $booking_date
 * @property int|null $client_id
 * @property int|null $worker_id
 *
 * @property Client $client
 * @property Worker $worker
 */
class PhysicalEvaluationBooking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'physical_evaluation_booking';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['booking_date'], 'required'],
            [['booking_date'], 'safe'],
            ['booking_date', 'unique', 'targetClass' => '\backend\models\PhysicalEvaluationBooking', 'message' => 'Esta data ja esta preenchida'],
            [['client_id', 'worker_id'], 'integer'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::class, 'targetAttribute' => ['client_id' => 'client_id']],
            [['worker_id'], 'exist', 'skipOnError' => true, 'targetClass' => Worker::class, 'targetAttribute' => ['worker_id' => 'worker_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'booking_date' => 'Booking Date',
            'client_id' => 'Client ID',
            'worker_id' => 'Worker ID',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::class, ['client_id' => 'client_id']);
    }

    /**
     * Gets query for [[Worker]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorker()
    {
        return $this->hasOne(Worker::class, ['worker_id' => 'worker_id']);
    }
}
