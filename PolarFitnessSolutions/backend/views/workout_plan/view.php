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
        <?= Html::a('Adicionar Exercício', ['/workout_plan_exercise_relation/create', 'workout_id'=>$model->id], ['class' => 'btn btn-success']) ?>
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
            [
                'attribute'=>'workout_name',
                'label'=>'Nome',
                'value'=>$model->workout_name,
            ],
            [
                'attribute' => 'created_at',
                'label' => 'Criado a ',
                'value' => Yii::$app->formatter->asDatetime($model->created_at),
            ],
            [
                'attribute' => 'updated_at',
                'label' => 'Atualizado a ',
                'value' => Yii::$app->formatter->asDatetime($model->updated_at),
            ],
            [
                'attribute' => 'clientUsername',
                'label' => 'Nome Cliente ',
                'value' => $model->client->user->username,
            ],
            [
                'attribute' => 'client_id',
                'label' => 'ID Cliente ',
                'value' => $model->client_id,
            ],
            [
                'attribute' => 'workerUsername',
                'label' => 'Nome Funcionário ',
                'value' => $model->worker->user->username,
            ],
            [
                'attribute' => 'worker_id',
                'label' => 'ID Funcionário ',
                'value' => $model->worker_id,
            ],
        ],
    ]) ?>

</div>
