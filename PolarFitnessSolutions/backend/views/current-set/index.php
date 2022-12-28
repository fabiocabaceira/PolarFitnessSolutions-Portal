<?php

use frontend\models\Current_set;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\Current_setSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Current Sets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="current-set-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Current Set', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'reps',
            'set_weight',
            'exercise_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Current_set $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
