<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Exercise $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="exercise-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'exercise_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'max_rep')->textInput() ?>

    <?= $form->field($model, 'min_rep')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
