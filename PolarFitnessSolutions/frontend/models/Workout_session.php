<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "workout_session".
 *
 * @property int $id
 * @property string|null $start_time
 * @property string|null $end_time
 * @property int|null $set_id
 * @property int|null $user_id
 *
 * @property CurrentSet $set
 * @property User $user
 */
class Workout_session extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workout_session';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['start_time', 'end_time'], 'safe'],
            [['set_id', 'user_id'], 'integer'],
            [['set_id'], 'exist', 'skipOnError' => true, 'targetClass' => CurrentSet::class, 'targetAttribute' => ['set_id' => 'id']],
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
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'set_id' => 'Set ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Set]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSet()
    {
        return $this->hasOne(CurrentSet::class, ['id' => 'set_id']);
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
