<?php

use backend\models\Exercise;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\ExerciseSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Exercícios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exercise-index">

    <p>
        <?= Html::a('Adicionar Exercício', ['create'], ['class' => 'btn btn-success']) ?>
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

            [
                   'attribute' =>    'exercise_name',
                    'label' => 'Nome do exercício',
],

            'max_rep',
            'min_rep',
            'sets',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Exercise $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
