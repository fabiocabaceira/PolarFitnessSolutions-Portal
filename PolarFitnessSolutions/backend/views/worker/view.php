<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Worker $model */

$this->title = $model->worker_id;
$this->params['breadcrumbs'][] = ['label' => 'Workers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="worker-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'worker_id' => $model->worker_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'worker_id' => $model->worker_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'worker_id',
        ],
    ]) ?>

</div>
