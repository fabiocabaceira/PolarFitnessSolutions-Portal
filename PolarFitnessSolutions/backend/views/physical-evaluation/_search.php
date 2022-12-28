<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Physical_evaluationSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="physical-evaluation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'imc') ?>

    <?= $form->field($model, 'fc_repouso') ?>

    <?= $form->field($model, 'peso') ?>

    <?= $form->field($model, 'massa_magra') ?>

    <?php // echo $form->field($model, 'massa_gorda_ideal') ?>

    <?php // echo $form->field($model, 'massa_gorda_normal') ?>

    <?php // echo $form->field($model, 'fc_maximo') ?>

    <?php // echo $form->field($model, 'altura') ?>

    <?php // echo $form->field($model, 'massa_gorda') ?>

    <?php // echo $form->field($model, 'peso_corporal') ?>

    <?php // echo $form->field($model, 'excesso_de_peso') ?>

    <?php // echo $form->field($model, 'percentagem_de_gordura') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'worker_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
