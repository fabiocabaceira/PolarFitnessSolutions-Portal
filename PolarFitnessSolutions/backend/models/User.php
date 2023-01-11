<?php

namespace backend\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

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
 * @property string $subscription
 *
 * @property Booking[] $bookings
 * @property Client $client
 * @property Worker $worker
 */
class User extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['username', 'password_hash', 'email', 'auth_key', 'created_at', 'updated_at', 'street', 'zip_code', 'area', 'phone_number', 'nif', 'subscription'], 'required'],
            [['created_at', 'updated_at', 'status', 'phone_number', 'nif'], 'integer'],
            [['gender', 'subscription'], 'string'],
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
    public function attributeLabels(): array
    {
        return [
            'username' => 'Nome',
            'email' => 'Email',
            'password' => 'Palavra-Passe',
            'street' => 'Rua',
            'zip_code' => 'Código postal',
            'area' => 'Localidade',
            'phone_number' => 'Número de telemóvel',
            'nif' => 'NIF',
            'gender' => 'Género',
            'id' => 'ID',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'password_reset_token' => 'Password Reset Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
            'status' => 'Status',
            'subscription' => 'Subscrição',
        ];
    }

    /**
     * Gets query for [[Bookings]].
     *
     * @return ActiveQuery
     */
    public function getBookings(): ActiveQuery
    {
        return $this->hasMany(Booking::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Client]].
     *
     * @return ActiveQuery
     */
    public function getClient(): ActiveQuery
    {
        return $this->hasOne(Client::class, ['client_id' => 'id']);
    }

    /**
     * Gets query for [[Worker]].
     *
     * @return ActiveQuery
     */
    public function getWorker(): ActiveQuery
    {
        return $this->hasOne(Worker::class, ['worker_id' => 'id']);
    }
}
