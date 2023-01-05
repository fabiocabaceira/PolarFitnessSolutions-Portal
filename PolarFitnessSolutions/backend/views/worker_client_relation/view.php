<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\WorkerClientRelation $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Worker Client Relations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="worker-client-relation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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

            [
                'attribute' => 'id',
                'label' => 'ID da Atribuição',
            ],

            [
                'attribute' => 'client.username',
                'label' => 'Nome do Cliente',
                'value' => function($model, $index){
                    return $model->client->user->username;
                }

            ],

            [
                'attribute' => 'worker.username',
                'label' => 'Nome do Funcionário',
                'value' => function($model, $index){
                    return $model->worker->user->username;
                }
            ],

            [
                'attribute' => 'client_id',
                'label' => 'ID do Cliente',
            ],


            [
                'attribute' => 'worker_id',
                'label' => 'ID do Funcionário',

            ],


        ],
    ]) ?>

</div>
