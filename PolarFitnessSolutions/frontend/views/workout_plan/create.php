<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Workout_plan $model */

$this->title = 'Criar Plano de Treino';
$this->params['breadcrumbs'][] = ['label' => 'Planos de Treino', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workout-plan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    if(Yii::$app->user->can('funcionario')){?>
        <?= $this->render('_form', [
            'model' => $model,
        ])?>
        <?php
    }
    if (Yii::$app->user->can('utilizador')){?>
        <?= $this->render('_form_utilizador', [
            'model' => $model,
        ])?>
        <?php
    }
    ?>
</div>
