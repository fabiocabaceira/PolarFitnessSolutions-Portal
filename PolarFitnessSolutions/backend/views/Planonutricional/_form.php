<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Planonutricional $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="planonutricional-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'conteudo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'createdate')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'id_funcionario')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
