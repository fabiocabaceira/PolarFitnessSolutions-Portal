<?php

use app\models\Planonutricional;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PlanonutricionalSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Planonutricionals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planonutricional-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Planonutricional', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'conteudo:ntext',
            'createdate',
            'id_user',
            'id_funcionario',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Planonutricional $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
