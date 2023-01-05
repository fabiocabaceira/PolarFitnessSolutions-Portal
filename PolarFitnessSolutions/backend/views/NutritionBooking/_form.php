<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\NutritionBooking $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="nutrition-booking-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'booking_date')->textInput() ?>

    <?= $form->field($model, 'client_id')->textInput() ?>

    <?= $form->field($model, 'worker_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
