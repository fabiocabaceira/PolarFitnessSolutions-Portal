<?php

use frontend\models\nutrition_plan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\nutrition_planSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */


$this->title = 'Planos de Nutrição';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="nutrition-plan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Plano de Nutrição', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nutritionname',
            [
                'attribute' => 'client_id',
                'label' => 'ID Cliente',
                'value' => function($model, $index, $dataColumn) {
                    return $model->client_id;
                },
            ],
            [
                'attribute' => 'worker_id',
                'label' => 'ID Funcionário',
                'value' => function($model, $index, $dataColumn) {
                    return $model->client_id;
                },
            ],
            [
                'attribute' => 'content:ntext',
                'label' => 'Conteudo',
                'value' => function($model, $index, $dataColumn) {
                    return $model->content;
                },
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Nutrition_plan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
