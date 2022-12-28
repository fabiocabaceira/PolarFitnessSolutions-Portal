<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Exercise $model */

$this->title = 'Update Exercise: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Exercises', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="exercise-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
