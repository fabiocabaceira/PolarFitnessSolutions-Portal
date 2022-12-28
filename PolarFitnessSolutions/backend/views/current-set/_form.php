<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Current_set $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="current-set-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reps')->textInput() ?>

    <?= $form->field($model, 'set_weight')->textInput() ?>

    <?= $form->field($model, 'exercise_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
