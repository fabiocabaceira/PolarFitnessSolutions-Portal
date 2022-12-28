<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Physical_evaluation $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="physical-evaluation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'imc')->textInput() ?>

    <?= $form->field($model, 'fc_repouso')->textInput() ?>

    <?= $form->field($model, 'peso')->textInput() ?>

    <?= $form->field($model, 'massa_magra')->textInput() ?>

    <?= $form->field($model, 'massa_gorda_ideal')->textInput() ?>

    <?= $form->field($model, 'massa_gorda_normal')->textInput() ?>

    <?= $form->field($model, 'fc_maximo')->textInput() ?>

    <?= $form->field($model, 'altura')->textInput() ?>

    <?= $form->field($model, 'massa_gorda')->textInput() ?>

    <?= $form->field($model, 'peso_corporal')->textInput() ?>

    <?= $form->field($model, 'excesso_de_peso')->textInput() ?>

    <?= $form->field($model, 'percentagem_de_gordura')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'worker_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
