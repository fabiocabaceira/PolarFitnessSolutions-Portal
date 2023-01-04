<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\nutrition_plan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="nutrition-plan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nutritionname')->textInput()->label('Nome do plano de nutrição') ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6])->label('Conteudo') ?>

    <?= $form->field($model, 'client_id')->textInput()->label('Nome do cliente') ?>

    <?= $form->field($model, 'worker_id')->textInput()->label('Nome do funcionario') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
