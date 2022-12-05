<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Planodetreino $model */

$this->title = 'Update Planodetreino: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Planodetreinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="planodetreino-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
