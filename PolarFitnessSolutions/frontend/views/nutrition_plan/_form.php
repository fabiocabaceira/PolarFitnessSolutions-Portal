<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\nutrition_plan $model */
/** @var yii\widgets\ActiveForm $form */


?>

<div class="nutrition-plan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nutritionname')->textInput()->label('Nome do plano de nutrição') ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6])->label('Conteúdo') ?>

    <?= $form->field($model, 'client_id')->dropDownList(ArrayHelper::map(\frontend\models\WorkerClientRelation::find()->asArray()->with('client')->all(), 'client_id', 'client_id', 'user.username'))->label('ID Cliente')?>

    <?= $form->field($model, 'worker_id')->hiddenInput(['value'=> Yii::$app->user->id])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
