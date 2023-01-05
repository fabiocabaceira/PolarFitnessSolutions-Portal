<?php

use backend\models\WorkerClientRelation;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\worker_client_relationSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Atribuição de Profissionais';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-client-relation-index">

    <p>
        <?= Html::a('Atribuir Funcionário a Cliente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'label' => 'ID da Atribuição',
            ],
            [
                'attribute' => 'client.username',
                'label' => 'Nome do cliente',
                'value' => function($model, $index, $dataColumn){
                return $model->client->user->username;
                }
            ],
            [
                'attribute' => 'worker.username',
                'label' => 'Nome do funcionário',
                'value' => function($model, $index, $dataColumn){
                    return $model->worker->user->username;
                }
            ],
            [
                    'attribute' => 'worker_id',
                    'label' => 'ID do Funcionário',

            ],
            [
                'attribute' => 'client_id',
                'label' => 'ID do Cliente',
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, WorkerClientRelation $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
