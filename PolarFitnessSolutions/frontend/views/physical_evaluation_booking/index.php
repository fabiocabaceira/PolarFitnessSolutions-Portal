<?php

use frontend\models\PhysicalEvaluationBooking;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\PhysicalEvaluationBookingSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Consultas de Avaliação Física';
?>
<div class="physical-evaluation-booking-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (Yii::$app->user->can('funcionario')){ ?>
        <p>
            <?= Html::a('Criar Consulta de Avaliação Física', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php }
    ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'tableOptions' => [
            'table class' => 'table table-hover',
        ],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'booking_date',
                'label' => 'Data da Consulta',
            ],
            [
                'attribute' => 'clientUsername',
                'label' => 'Cliente',
                'value' => function($model, $index, $dataColumn) {
                    return $model->client->user->username;
                },
                'visible'=> Yii::$app->user->can('funcionario'),
            ],
            [
                'attribute' => 'workerUsername',
                'label' => 'Funcionário',
                'value' => function($model, $index, $dataColumn) {
                    return $model->worker->user->username;
                },
                'visible'=> Yii::$app->user->can('utilizador'),
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PhysicalEvaluationBooking $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },
                 'visible'=>Yii::$app->user->can('funcionario'),
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{view}',
                'visible'=> Yii::$app->user->can('utilizador'),
            ],
        ],
    ]); ?>


</div>
