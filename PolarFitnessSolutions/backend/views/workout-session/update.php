<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Workout_session $model */

$this->title = 'Update Workout Session: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Workout Sessions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="workout-session-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
