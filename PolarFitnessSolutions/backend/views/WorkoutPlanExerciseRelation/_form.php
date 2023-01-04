<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\WorkoutPlanExerciseRelation $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="workout-plan-exercise-relation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'workout_plan_id')->textInput() ?>

    <?= $form->field($model, 'exercise_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
