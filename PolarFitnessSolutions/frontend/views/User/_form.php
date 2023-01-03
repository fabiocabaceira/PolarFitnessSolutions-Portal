<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => true])->label('Rua') ?>

    <?= $form->field($model, 'zip_code')->textInput(['maxlength' => true])->label('Código Postal') ?>

    <?= $form->field($model, 'area')->textInput(['maxlength' => true])->label('Localidade') ?>

    <?= $form->field($model, 'nif')->textInput()->label('NIF') ?>

    <?= $form->field($model, 'gender')->dropDownList([ 'Masculino' => 'Masculino', 'Feminimo' => 'Feminimo', 'Outro' => 'Outro', ], ['prompt' => ''])->label('Género') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
