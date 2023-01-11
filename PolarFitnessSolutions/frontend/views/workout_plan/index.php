<?php

use frontend\models\Workout_plan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\Workout_planSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Planos de Treino';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workout-plan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Plano de Treino', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
            'tableOptions' => [
                'table class' => 'table table-bordered border-primary'
],

        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'workout_name',
            [
                'attribute' => 'clientUsername',
                'label' => 'Cliente',
                'value' => function($model, $index, $dataColumn) {
                    return $model->client->user->username;
                },
                'visible'=> Yii::$app->user->can('funcionario'),
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
                'visible'=> Yii::$app->user->can('utilizador'),
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Workout_plan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
