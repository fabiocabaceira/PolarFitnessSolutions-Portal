<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\WorkoutPlan $model */

$this->title = 'Create Workout Plan';
$this->params['breadcrumbs'][] = ['label' => 'Workout Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workout-plan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
