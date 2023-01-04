<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\nutrition_plan $model */

$this->title = 'Update Nutrition Plan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nutrition Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nutrition-plan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
