<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\SignupForm $model */
/** @var ActiveForm $form */
?>
<div class="signup">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password') ?>
        <?= $form->field($model, 'rua') ?>
        <?= $form->field($model, 'codigo_postal') ?>
        <?= $form->field($model, 'localidade') ?>
        <?= $form->field($model, 'telefone') ?>
        <?= $form->field($model, 'nif') ?>
        <?= $form->field($model, 'genero') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- signup -->
