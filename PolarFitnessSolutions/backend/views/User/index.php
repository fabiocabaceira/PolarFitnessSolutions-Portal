<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'username',
            //'password_hash',
            'email:email',
            //'auth_key',
            //'password_reset_token',
            //'created_at',
            //'updated_at',
            //'verification_token',
            [
                    'label'=>'status',
                    'value'=> function ($model){
                        if($model->status ==0){
                            return 'Apagado';
                        }
                        if ($model->status ==9){
                            return 'Inativo';
                        }
                        if ($model->status ==10){
                            return 'Ativo';
                        }
                        else{
                            return 'Invalido';
                        }
                    },
                    'attribute'=>'status',
                'filter'=>['0' => 'Apagado','9' => 'Inativo','10' => 'Ativo',]
            ],
            //'rua',
            //'codigo_postal',
            'localidade',
            'telefone',
            'nif',
            //'genero',
            //'ginasio_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
