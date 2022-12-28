<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Worker $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="worker-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'worker_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
