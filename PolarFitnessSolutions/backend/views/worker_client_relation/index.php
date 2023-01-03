<?php

use backend\models\WorkerClientRelation;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\worker_client_relationSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Atribuição de Profissionais';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-client-relation-index">

    <p>
        <?= Html::a('Atribuir funcionario a cliente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'client_id',

            'worker_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, WorkerClientRelation $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
