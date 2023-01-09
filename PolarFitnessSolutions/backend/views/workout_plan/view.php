<?php

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\WorkoutPlan $model */
/** @var backend\models\ExerciseSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = $model->workout_name;
$this->params['breadcrumbs'][] = ['label' => 'Planos de Treino', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="workout-plan-view">

    <p>
        <?= Html::a('Adicionar Exercício', ['/WorkoutPlanExerciseRelation/create', 'workout_id'=>$model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Atualizar Plano de Treino', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar Plano de Treino', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que deseja apagar este plano de treino?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php if ($dataProvider->count != 0){ ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute'=>'exercise.exercise_name',
                    'label'=>'Nome',
                    'value' => function($searchModel, $index, $dataColumn) {
                        return $searchModel->exercise->exercise_name;
                    },
                ],
                [
                    'attribute'=>'exercise.max_rep',
                    'label'=>'Max rep',
                    'value' => function($searchModel, $index, $dataColumn) {
                        return $searchModel->exercise->max_rep;
                    },
                ],
                [
                    'attribute'=>'exercise.min_rep',
                    'label'=>'Min rep',
                    'value' => function($searchModel, $index, $dataColumn) {
                        return $searchModel->exercise->min_rep;
                    },
                ],
                [
                    'attribute'=>'exercise.sets',
                    'label'=>'Sets',
                    'value' => function($searchModel, $index, $dataColumn) {
                        return $searchModel->exercise->sets;
                    },
                ],
                [
                    'class' => ActionColumn::className(),
                    'template' => '{delete}',
                    'controller' => 'workout_plan_exercise_relation',
                ],
            ],
        ]); ?>
    <?php }
    else{?>
        <p style="color:red; font-size:22px" > Ainda não adicionou exercícios.</p>
    <?php }
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'workout_name',
            'created_at',
            'updated_at',
            'client_id',
            'worker_id',
        ],
    ]) ?>

</div>
