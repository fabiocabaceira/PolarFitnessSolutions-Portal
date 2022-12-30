<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "exercise".
 *
 * @property int $id
 * @property string $exercise_name
 * @property int|null $max_rep
 * @property int|null $min_rep
 *
 * @property CurrentSet[] $currentSets
 */
class Exercise extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exercise';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['exercise_name'], 'required'],
            [['max_rep', 'min_rep'], 'integer'],
            [['exercise_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'exercise_name' => 'Exercise Name',
            'max_rep' => 'Max Rep',
            'min_rep' => 'Min Rep',
        ];
    }

    /**
     * Gets query for [[CurrentSets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurrentSets()
    {
        return $this->hasMany(CurrentSet::class, ['exercise_id' => 'id']);
    }
}
