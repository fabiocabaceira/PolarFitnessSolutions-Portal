<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Gym_area $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="gym-area-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'capacity')->textInput() ?>

    <?= $form->field($model, 'area_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
