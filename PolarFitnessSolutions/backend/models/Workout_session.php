<?php

namespace backend\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

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
class Workout_session extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'workout_session';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
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
    public function attributeLabels(): array
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
     * @return ActiveQuery
     */
    public function getSet(): ActiveQuery
    {
        return $this->hasOne(CurrentSet::class, ['id' => 'set_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return ActiveQuery
     */
    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
