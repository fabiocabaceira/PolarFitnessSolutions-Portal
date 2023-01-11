<?php

use frontend\models\WorkerClientRelation;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\worker_client_relationSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Os meus clientes';
$this->params['breadcrumbs'][] = $this->title;
?>


    <h1><?= Html::encode($this->title) ?></h1>


                <?= GridView::widget([
                    'tableOptions' => [
                        'table class' => 'table table-hover',
                    ],
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        //ID do cliente
                        [
                            'attribute' => 'client_id',
                            'label' => 'ID do cliente'
                        ],
                        // Nome do cliente
                        [
                            'attribute' => 'clientUsername',
                            'label' => 'Nome',
                            'value' => function($model, $index, $dataColumn) {
                                return $model->client->user->username;
                            },
                        ],
                        // Email
                        [
                            'attribute' => 'email',
                            'label' => 'Email',
                            'value' => function($model, $index, $dataColumn) {
                                return $model->client->user->email;
                            },
                        ],
                        // Rua
                        [
                            'attribute' => 'user.street',
                            'label' => 'Rua',
                            'value' => function($model, $index, $dataColumn) {
                                return $model->client->user->street;
                            },
                        ],
                        // Código Postal
                        [
                            'attribute' => 'user.zip_code',
                            'label' => 'Código Postal',
                            'value' => function($model, $index, $dataColumn) {
                                return $model->client->user->zip_code;
                            },
                        ],
                        // Localidade
                        [
                            'attribute' => 'user.area',
                            'label' => 'Localidade',
                            'value' => function($model, $index, $dataColumn) {
                                return $model->client->user->area;
                            },
                        ],
                        // Número de telemóvel
                        [
                            'attribute' => 'user.phone_number',
                            'label' => 'Número de telemóvel',
                            'value' => function($model, $index, $dataColumn) {
                                return $model->client->user->phone_number;
                            },
                        ],
                        // Nif
                        [
                            'attribute' => 'user.nif',
                            'label' => 'Nif',
                            'value' => function($model, $index, $dataColumn) {
                                return $model->client->user->nif;
                            },
                        ],
                        // Género
                        [
                            'attribute' => 'user.gender',
                            'label' => 'Género',
                            'value' => function($model, $index, $dataColumn) {
                                return $model->client->user->gender;
                            },
                        ],
                        [
                            'class' => ActionColumn::className(),
                            'template'=>'{view} {update}',
                            'urlCreator' => function ($action,  $model, $key, $index, $column) {
                                return Url::toRoute(['client/' . $action, 'client_id' => $model->client_id]);
                            }
                        ],
                    ],
                ]); ?>
            </div>
        </div>

    </div>




