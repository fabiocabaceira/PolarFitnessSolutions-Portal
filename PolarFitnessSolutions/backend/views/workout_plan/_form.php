<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\WorkoutPlan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="workout-plan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'workout_name')->textInput(['maxlength' => true])->label('Nome do Plano de Treino') ?>

    <?= $form->field($model, 'client_id')->dropDownList(ArrayHelper::map(\frontend\models\WorkerClientRelation::find()->leftJoin('user', 'user.id = client_id')->asArray()->with('client')->all(), 'client_id', 'client_id', 'workout_plan_relation.client.user.username'))->label('ID Cliente')?>

    <?= $form->field($model, 'worker_id')->dropDownList(ArrayHelper::map(\frontend\models\WorkerClientRelation::find()->asArray()->with('worker')->all(), 'worker_id', 'worker_id', 'user.username'))->label('ID Funcionário')?>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
