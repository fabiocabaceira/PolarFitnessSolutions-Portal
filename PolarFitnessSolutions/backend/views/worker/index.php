<?php

use frontend\models\Worker;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\WorkerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Funcionários';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-index">

    <p>
        <?= Html::a('Criar Funcionário', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'worker_id',
            'label' => 'ID do Funcionário',
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
                'label' => 'Nif',
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
                'urlCreator' => function ($action, Worker $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'worker_id' => $model->worker_id]);
                 }
            ],
        ],
    ]); ?>


</div>
