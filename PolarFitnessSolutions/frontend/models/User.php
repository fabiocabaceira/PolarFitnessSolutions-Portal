<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password_hash
 * @property string $email
 * @property string $auth_key
 * @property string|null $password_reset_token
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 * @property int $status
 * @property string $street
 * @property string $zip_code
 * @property string $area
 * @property int $phone_number
 * @property int $nif
 * @property string|null $gender
 *
 * @property Booking[] $bookings
 * @property Client $client
 * @property GymArea[] $gymAreas
 * @property Messages[] $messages
 * @property Messages[] $messages0
 * @property NutritionPlan[] $nutritionPlans
 * @property NutritionPlan[] $nutritionPlans0
 * @property PhysicalEvaluation[] $physicalEvaluations
 * @property PhysicalEvaluation[] $physicalEvaluations0
 * @property Worker $worker
 * @property WorkoutPlan[] $workoutPlans
 * @property WorkoutPlan[] $workoutPlans0
 * @property WorkoutSession[] $workoutSessions
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'email', 'auth_key', 'created_at', 'updated_at', 'street', 'zip_code', 'area', 'phone_number', 'nif'], 'required'],
            [['created_at', 'updated_at', 'status', 'phone_number', 'nif'], 'integer'],
            [['gender'], 'string'],
            [['username', 'area'], 'string', 'max' => 50],
            [['password_hash', 'password_reset_token', 'verification_token'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 70],
            [['auth_key'], 'string', 'max' => 32],
            [['street'], 'string', 'max' => 200],
            [['zip_code'], 'string', 'max' => 8],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password_hash' => 'Password Hash',
            'email' => 'Email',
            'auth_key' => 'Auth Key',
            'password_reset_token' => 'Password Reset Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
            'status' => 'Status',
            'street' => 'Street',
            'zip_code' => 'Zip Code',
            'area' => 'Area',
            'phone_number' => 'Phone Number',
            'nif' => 'Nif',
            'gender' => 'Gender',
        ];
    }

    /**
     * Gets query for [[Bookings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::class, ['client_id' => 'id']);
    }

    /**
     * Gets query for [[GymAreas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGymAreas()
    {
        return $this->hasMany(GymArea::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Messages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Messages::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Messages0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMessages0()
    {
        return $this->hasMany(Messages::class, ['worker_id' => 'id']);
    }

    /**
     * Gets query for [[NutritionPlans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNutritionPlans()
    {
        return $this->hasMany(NutritionPlan::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[NutritionPlans0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNutritionPlans0()
    {
        return $this->hasMany(NutritionPlan::class, ['worker_id' => 'id']);
    }

    /**
     * Gets query for [[PhysicalEvaluations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhysicalEvaluations()
    {
        return $this->hasMany(PhysicalEvaluation::class, ['worker_id' => 'id']);
    }

    /**
     * Gets query for [[PhysicalEvaluations0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhysicalEvaluations0()
    {
        return $this->hasMany(PhysicalEvaluation::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Worker]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorker()
    {
        return $this->hasOne(Worker::class, ['worker_id' => 'id']);
    }

    /**
     * Gets query for [[WorkoutPlans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkoutPlans()
    {
        return $this->hasMany(WorkoutPlan::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[WorkoutPlans0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkoutPlans0()
    {
        return $this->hasMany(WorkoutPlan::class, ['worker_id' => 'id']);
    }

    /**
     * Gets query for [[WorkoutSessions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkoutSessions()
    {
        return $this->hasMany(WorkoutSession::class, ['user_id' => 'id']);
    }
}
