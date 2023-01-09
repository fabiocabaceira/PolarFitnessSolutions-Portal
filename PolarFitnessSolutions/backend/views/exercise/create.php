<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Exercise $model */

$this->title = 'Criar Exercício';
$this->params['breadcrumbs'][] = ['label' => 'Exercícios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exercise-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
