<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Workout_plan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="workout-plan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'workout_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'worker_id')->dropDownList(ArrayHelper::map(\frontend\models\WorkerClientRelation::find()->asArray()->with('worker')->all(), 'worker_id', 'worker_id', 'user.username'))->label('ID Funcionario')?>

    <?= $form->field($model, 'client_id')->hiddenInput(['value'=> Yii::$app->user->id])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
