<?php

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Workout_plan $model */
/** @var frontend\models\ExerciseSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = $model->workout_name;
$this->params['breadcrumbs'][] = ['label' => 'Planos de Treino', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

//var_dump($dataProvider->count);
?>
<div class="workout-plan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Adicionar Exercício', ['/workout_plan_exercise_relation/create', 'workout_id'=>$model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php if (Yii::$app->user->can('funcionario')){?>
            <?= Html::a('Apagar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Tem a certeza que deseja apagar este plano de treino?',
                    'method' => 'post',
                ],
            ]) ?>
            <?php } ?>

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
                'attribute' => 'client_id',
                'label' => 'Cliente ',
                'value' => $model->client->user->username,
            ],
            [
                'attribute' => 'worker_id',
                'label' => 'Funcionário',
                'value' => function ($model, $widget){
                    if($model->worker == null){
                        return 'Nao existe';
                    }
                    return $model->worker->user->username;
                }
            ],
        ],
    ]) ?>

</div>
