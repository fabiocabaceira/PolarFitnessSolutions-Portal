<?php

use backend\models\WorkoutPlan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\WorkoutPlanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Planos de Treino';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workout-plan-index">

    <p>
        <?= Html::a('Criar Planos de Treino', ['create'], ['class' => 'btn btn-success']) ?>
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
            'workout_name',
            [
                'attribute' => 'clientUsername',
                'label' => 'Cliente',
                'value' => function($model, $index, $dataColumn) {
                    return $model->client->user->username;
                },
            ],
            [
                'attribute' => 'client_id',
                'label' => 'ID Cliente',
                'value' => function($model, $index, $dataColumn) {
                    return $model->client_id;
                },
            ],
            [
                'attribute' => 'workerUsername',
                'label' => 'Funcionário',
                'value' => function($model, $index, $dataColumn) {
                    if($model->worker == null){
                        return 'Não existe';
                    }
                    return $model->worker->user->username;
                },
            ],
            [
                'attribute' => 'worker_id',
                'label' => 'ID Funcionário',
                'value' => function($model, $index, $dataColumn) {
                    if ($model->worker_id == null){
                        return 'Não tem funcionário associado';
                    }
                    else{
                        return $model->worker_id;
                    }
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, WorkoutPlan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
