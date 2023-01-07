<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Worker $model */
$user = \frontend\models\User::findOne($model->worker_id);
$this->title = 'Update Worker: ' . $model->worker_id;
$this->params['breadcrumbs'][] = ['label' => 'Workers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->worker_id, 'url' => ['view', 'worker_id' => $model->worker_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="worker-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formUpdate', [
            'user' => $user,
        'model' => $model,
    ]) ?>

</div>
