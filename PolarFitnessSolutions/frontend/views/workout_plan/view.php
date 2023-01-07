<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Workout_plan $model */

$this->title = $model->workout_name;
$this->params['breadcrumbs'][] = ['label' => 'Planos de Treino', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="workout-plan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que deseja apagar este plano de treino?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
                'value' => $model->worker->user->username,
            ],
        ],
    ]) ?>

</div>
