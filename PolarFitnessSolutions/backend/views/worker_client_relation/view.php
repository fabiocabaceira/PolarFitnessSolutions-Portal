<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\WorkerClientRelation $model */

$this->title = 'Relação entre: ' . $model->client->user->username . ' e '. $model->worker->user->username;
$this->params['breadcrumbs'][] = ['label' => 'Atribuição de Profissionais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="worker-client-relation-view">

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que deseja apagar esta relação?',
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
