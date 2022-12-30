<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\User $model */
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

    <?= $form->field($user, 'gender')->dropDownList([ 'Masculino' => 'Masculino', 'Feminimo' => 'Feminimo', 'Outro' => 'Outro', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
