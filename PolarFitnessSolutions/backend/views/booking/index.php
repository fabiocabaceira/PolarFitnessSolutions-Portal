<?php

use frontend\models\Booking;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\BookingSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Inscrições';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-index">





    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'tableOptions' => [
            'table class' => 'table table-hover',
        ],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            ['attribute' => 'booking_date',
                'label' => 'Data da Inscrição',
            ],
            // Username
            [
                'attribute' => 'user.username',
                'label' => 'Username',
                'value' => function($model, $index, $dataColumn) {
                    return $model->user->username;
                },
            ],

            // Email
            [
                'attribute' => 'user.email',
                'label' => 'Email',
                'value' => function($model, $index, $dataColumn) {
                    return $model->user->email;
                },
            ],

            // Número de telemóvel
            [
                'attribute' => 'user.phone_number',
                'label' => 'Número de telemóvel',
                'value' => function($model, $index, $dataColumn) {
                    return $model->user->phone_number;
                },
            ],

            ['attribute' => 'user_id',
                'label' =>  'ID do Cliente',
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Booking $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
