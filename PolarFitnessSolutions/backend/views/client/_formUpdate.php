<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($user, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'zip_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'phone_number')->textInput() ?>

    <?= $form->field($user, 'nif')->textInput() ?>

    <?= $form->field($user, 'gender')->dropDownList([ 'Masculino' => 'Masculino', 'Feminino' => 'Feminino', 'Outro' => 'Outro', ], ['prompt' => '']) ?>

    <?= $form->field($user, 'subscription')->dropDownList([ 'Inativo' => 'Inativo', 'Ativo' => 'Ativo', ], ['prompt' => '']) ?>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
