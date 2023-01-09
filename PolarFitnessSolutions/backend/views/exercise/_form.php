<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Exercise $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="exercise-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'exercise_name')->textInput(['maxlength' => true])->label('Nome do Exercício') ?>

    <?= $form->field($model, 'max_rep')->textInput()->label('Número Máximo de Repetições') ?>

    <?= $form->field($model, 'min_rep')->textInput()->label('Número Minímo de Repetições') ?>

    <?= $form->field($model, 'sets')->textInput()->label('Número de Sets') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
