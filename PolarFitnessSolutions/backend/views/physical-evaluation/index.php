<?php

use frontend\models\Physical_evaluation;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\Physical_evaluationSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Physical Evaluations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="physical-evaluation-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Physical Evaluation', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'imc',
            'fc_repouso',
            'peso',
            'massa_magra',
            //'massa_gorda_ideal',
            //'massa_gorda_normal',
            //'fc_maximo',
            //'altura',
            //'massa_gorda',
            //'peso_corporal',
            //'excesso_de_peso',
            //'percentagem_de_gordura',
            //'user_id',
            //'worker_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Physical_evaluation $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
