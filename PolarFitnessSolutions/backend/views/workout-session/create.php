<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Workout_session $model */

$this->title = 'Create Workout Session';
$this->params['breadcrumbs'][] = ['label' => 'Workout Sessions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workout-session-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
