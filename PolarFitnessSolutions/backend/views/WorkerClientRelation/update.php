<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\WorkerClientRelation $model */

$this->title = 'Update Worker Client Relation: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Worker Client Relations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="worker-client-relation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
