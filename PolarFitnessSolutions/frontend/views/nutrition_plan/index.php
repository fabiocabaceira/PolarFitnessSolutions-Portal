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

    <?php if (Yii::$app->user->can('funcionario')){ ?>
    <p>
        <?= Html::a('Criar Plano de Nutrição', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php }?>


    <?php  // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'tableOptions' => [
            'table class' => 'table table-hover',
        ],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'nutritionname',
                'label'=>'Nome',
                'value' => function($model, $index, $dataColumn) {
                    return $model->nutritionname;
                },
            ],
            [
                'attribute' => 'clientUsername',
                'label' => 'Cliente',
                'value' => function($model, $index, $dataColumn) {
                    return $model->client->user->username;
                },
            ],
            [
                'attribute' => 'content:ntext',
                'label' => 'Conteúdo',
                'value' => function($model, $index, $dataColumn) {
                    return $model->content;
                },

            ],

            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete}',
                'urlCreator' => function ($action, Nutrition_plan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
