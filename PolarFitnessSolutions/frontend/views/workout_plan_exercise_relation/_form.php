<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Workout_plan_exercise_relation $model */
/** @var yii\widgets\ActiveForm $form */


?>

<div class="workout-plan-exercise-relation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'workout_plan_id')->hiddenInput(['value'=> $workout_id])->label(false) ?>

    <?= $form->field($model, 'exercise_id')->dropDownList(ArrayHelper::map(\frontend\models\exercise::find()->all(), 'id', 'exercise_name'))?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
