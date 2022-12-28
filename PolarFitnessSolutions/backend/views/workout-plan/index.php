<?php

use frontend\models\Workout_plan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\Workout_planSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Workout Plans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workout-plan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Workout Plan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'workout_name',
            'createdate',
            'user_id',
            'worker_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Workout_plan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
