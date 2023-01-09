<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Workout_plan_exercise_relation $model */

$workoutPlan = \backend\models\WorkoutPlan::findOne($workout_id);

$this->title = 'Adicione Exercicios a: '. $workoutPlan->workout_name ;
$this->params['breadcrumbs'][] = ['label' => $workoutPlan->workout_name, 'url' => ['workout_plan/view?id=' . $workout_id]];
$this->params['breadcrumbs'][] = 'Exercicios de: ' . $workoutPlan->workout_name;
?>
<div class="workout-plan-exercise-relation-create">

    <?= $this->render('_form', [
        'model' => $model,
        'workout_id'=>$workout_id,
    ]) ?>

</div>
