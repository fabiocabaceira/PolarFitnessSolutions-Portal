<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Workout_plan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="workout-plan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'workout_name')->textInput(['maxlength' => true])->label('Nome') ?>

    <?= $form->field($model, 'worker_id')->hiddenInput(['value'=> null])->label(false); ?>

    <?= $form->field($model, 'client_id')->hiddenInput(['value'=> Yii::$app->user->id])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
