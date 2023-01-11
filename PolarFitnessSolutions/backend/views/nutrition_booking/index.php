<?php

use backend\models\NutritionBooking;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\NutritionBookingSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Consultas de Nutrição';
?>
<div class="nutrition-booking-index">

    <p>
        <?= Html::a('Marcar Consulta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'tableOptions' => [
            'table class' => 'table table-hover',
        ],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'booking_date',
                'label' => 'Data',
                'value' => function($model, $index, $dataColumn) {
                    return $model->booking_date;
                },
            ],
            [
                'attribute' => 'clientUsername',
                'label' => 'Cliente',
                'value' => function($model, $index, $dataColumn) {
                    return $model->client->user->username;
                },
            ],
            [
                'attribute' => 'workerUsername',
                'label' => 'Funcionário',
                'value' => function($model, $index, $dataColumn) {
                    return $model->worker->user->username;
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, NutritionBooking $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
