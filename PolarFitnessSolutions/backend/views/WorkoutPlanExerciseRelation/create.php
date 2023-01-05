<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\WorkoutPlanExerciseRelation $model */

$this->title = 'Create Workout Plan Exercise Relation';
$this->params['breadcrumbs'][] = ['label' => 'Workout Plan Exercise Relations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workout-plan-exercise-relation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
