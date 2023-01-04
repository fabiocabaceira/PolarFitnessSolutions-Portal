<?php

use backend\models\WorkoutPlanExerciseRelation;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\WorkoutPlanExerciseRelationSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Workout Plan Exercise Relations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workout-plan-exercise-relation-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Workout Plan Exercise Relation', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'workout_plan_id',
            'exercise_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, WorkoutPlanExerciseRelation $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
