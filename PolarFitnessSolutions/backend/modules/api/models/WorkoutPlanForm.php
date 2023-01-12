<?php

namespace backend\modules\api\models;

use backend\models\Client;
use backend\models\Worker;
use backend\models\WorkoutPlan;
use Yii;
use yii\base\Model;
use common\models\User;
use yii\behaviors\TimestampBehavior;

/**
 * Signup forms
 */
class WorkoutPlanForm extends Model
{
    public $workout_name;
    public $client_id;
    public $worker_id;

    public $workout;


    public function rules()
    {
        return ['id','workout_name','created_at','updated_at','client_id','worker_id',
            [['workout_name'], 'required'],
            [['client_id'], 'required'],
            [['created_at', 'client_id', 'worker_id', 'updated_at'], 'integer'],
            [['workout_name'], 'string', 'max' => 30],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::class, 'targetAttribute' => ['client_id' => 'client_id']],
            [['worker_id'], 'exist', 'skipOnError' => true, 'targetClass' => Worker::class, 'targetAttribute' => ['worker_id' => 'worker_id']],
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }



    public function create()
    {
        $this->workout= new WorkoutPlan();

        if (!$this->validate()) {
            return false;
        }

        $this->workout->workout_name = $this->workout_name;
        $this->workout->client_id = $this->client_id;
        $this->workout->worker_id = $this->worker_id;

        $this->workout->save();


        return true;
    }

}