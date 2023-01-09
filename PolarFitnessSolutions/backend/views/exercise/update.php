<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Exercise $model */

$this->title = 'Atualizar Exercício: ' . $model->exercise_name;
$this->params['breadcrumbs'][] = ['label' => 'Exercícios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->exercise_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="exercise-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
