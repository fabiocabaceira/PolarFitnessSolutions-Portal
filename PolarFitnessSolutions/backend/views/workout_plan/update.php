<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\WorkoutPlan $model */

$this->title = 'Atualizar Plano de Treino: ' . $model->workout_name;
$this->params['breadcrumbs'][] = ['label' => 'Planos de Treino', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->client->user->username . ': ' . $model->workout_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="workout-plan-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
