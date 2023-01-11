<?php

namespace backend\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "worker".
 *
 * @property int $worker_id
 *
 * @property User $worker
 */
class Worker extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'worker';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['worker_id'], 'required'],
            [['worker_id'], 'integer'],
            [['worker_id'], 'unique'],
            [['worker_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['worker_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'worker_id' => 'ID do Funcionário',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return ActiveQuery
     */
    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'worker_id']);
    }
}
