<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Exercise $model */

$this->title = $model->exercise_name;
$this->params['breadcrumbs'][] = ['label' => 'Exercícios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="exercise-view">


    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que deseja apagar este exercício?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Exercício',
                'value' => $model->exercise_name,
            ],
            [
                'label' => 'Número máximo de repetições',
                'value' => $model->max_rep,
            ],
            [
                'label' => 'Número minímo de repetições',
                'value' => $model->min_rep,
            ],
            [
                'label' => 'Número de sets',
                'value' => $model->sets,
            ],
        ],
    ]) ?>

</div>
