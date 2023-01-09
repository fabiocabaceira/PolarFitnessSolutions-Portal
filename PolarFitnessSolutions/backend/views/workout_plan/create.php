<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\WorkoutPlan $model */

$this->title = 'Criar Plano de Treino';
$this->params['breadcrumbs'][] = ['label' => 'Planos de Treino', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workout-plan-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
