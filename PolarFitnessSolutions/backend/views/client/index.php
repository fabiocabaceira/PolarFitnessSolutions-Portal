<?php

use frontend\models\client;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\clientSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Clientes';
?>
<div class="client-index">

    <p>
        <?= Html::a('Criar Cliente', ['create'], ['class' => 'btn btn-success']) ?>
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


            'client_id',

            // Username
            [
                    'attribute' => 'user.username',
                    'label' => 'Nome',
                    'value' => function($model, $index, $dataColumn) {
                    return $model->user->username;
                    },
            ],
            // Estado de subscrição
            [
                'attribute' => 'user.subscription',
                'label' => 'Estado de subscrição',
                'value' => function($model, $index, $dataColumn) {
                    return $model->user->subscription;
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
            // Rua
            [
                'attribute' => 'user.street',
                'label' => 'Rua',
                'value' => function($model, $index, $dataColumn) {
                    return $model->user->street;
                },
            ],
            // Código Postal
            [
                'attribute' => 'user.zip_code',
                'label' => 'Código Postal',
                'value' => function($model, $index, $dataColumn) {
                    return $model->user->zip_code;
                },
            ],
            // Localidade
            [
                'attribute' => 'user.area',
                'label' => 'Localidade',
                'value' => function($model, $index, $dataColumn) {
                    return $model->user->area;
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
            // Nif
            [
                'attribute' => 'user.nif',
                'label' => 'NIF',
                'value' => function($model, $index, $dataColumn) {
                    return $model->user->nif;
                },
            ],
            // Género
            [
                'attribute' => 'user.gender',
                'label' => 'Género',
                'value' => function($model, $index, $dataColumn) {
                    return $model->user->gender;
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action,  $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'client_id' => $model->client_id]);
                 }
            ],
        ],
    ]); ?>


</div>
