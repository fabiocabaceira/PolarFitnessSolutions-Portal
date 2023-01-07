<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Workout_plan_exercise_relation $model */

$this->title = 'Adicione Exercicios a ' ;
$this->params['breadcrumbs'][] = ['label' => 'Workout Plan Exercise Relations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workout-plan-exercise-relation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'workout_id' =>$workout_id,
    ]) ?>

</div>
