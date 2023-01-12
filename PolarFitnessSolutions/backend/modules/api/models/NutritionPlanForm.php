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

    public $nutrtionplan;

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
        $this->nutrtionplan = new Nutrition_plan();

        if (!$this->validate()){
            return false;
        }

        $this->nutrtionplan->nutritionname = $this->nutrtionname;
        $this->nutrtionplan->content = $this->content;
        $this->nutrtionplan->client_id = $this->client_id;
        $this->nutrtionplan->worker_id = $this->worker_id;
        $this->nutrtionplan->save();

        return true;
    }

    public function update(){

    }
}