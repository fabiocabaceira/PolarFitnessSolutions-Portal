<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "gym_area".
 *
 * @property int $id
 * @property int $capacity
 * @property string $area_name
 * @property int|null $user_id
 *
 * @property User $user
 */
class Gym_area extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gym_area';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['capacity', 'area_name'], 'required'],
            [['capacity', 'user_id'], 'integer'],
            [['area_name'], 'string', 'max' => 200],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'capacity' => 'Capacity',
            'area_name' => 'Area Name',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
