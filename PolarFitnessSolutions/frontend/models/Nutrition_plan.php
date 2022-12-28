<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "nutrition_plan".
 *
 * @property int $id
 * @property string $content
 * @property string $createdate
 * @property int|null $user_id
 * @property int|null $worker_id
 *
 * @property User $user
 * @property User $worker
 */
class Nutrition_plan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nutrition_plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'createdate'], 'required'],
            [['content'], 'string'],
            [['createdate'], 'safe'],
            [['user_id', 'worker_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['worker_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['worker_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'createdate' => 'Createdate',
            'user_id' => 'User ID',
            'worker_id' => 'Worker ID',
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

    /**
     * Gets query for [[Worker]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorker()
    {
        return $this->hasOne(User::class, ['id' => 'worker_id']);
    }
}
