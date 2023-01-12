<?php

namespace backend\modules\api\models;

use backend\models\Client;
use backend\models\Nutrition_plan;
use backend\models\Worker;
use yii\base\Model;
use yii\behaviors\TimestampBehavior;

class NutritionPlanForm extends Model
{
    public $nutritionname;
    public $content;
    public $client_id;
    public $worker_id;

    public $nutrition_plan;

    public function rules()
    {
        return [
            [['nutritionname', 'content'], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at', 'client_id', 'worker_id'], 'integer'],
            [['nutritionname'], 'string', 'max' => 30],
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

    public function create(){
        $this->nutrition_plan = new Nutrition_plan();

        if (!$this->validate()){
            return false;
        }

        $this->nutrition_plan->nutritionname = $this->nutrtionname;
        $this->nutrition_plan->content = $this->content;
        $this->nutrition_plan->client_id = $this->client_id;
        $this->nutrition_plan->worker_id = $this->worker_id;
        $this->nutrition_plan->save();

        return true;
    }

    public function update(){

    }
}