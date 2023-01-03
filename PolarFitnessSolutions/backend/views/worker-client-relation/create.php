<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\WorkerClientRelation $model */

$this->title = 'Create Worker Client Relation';
$this->params['breadcrumbs'][] = ['label' => 'Worker Client Relations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-client-relation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
