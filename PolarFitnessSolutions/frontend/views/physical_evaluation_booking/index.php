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

    <p>
        <?= Html::a('Criar Consulta de Avaliação Física', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
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
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PhysicalEvaluationBooking $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
