<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\WorkerClientRelationForm $model */
/** @var yii\widgets\ActiveForm $form */


?>

<div class="worker-client-relation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'client_id')->dropDownList(ArrayHelper::map(\backend\models\Client::find()->asArray()->with('user')->all(), 'client_id', 'client_id', 'user.username'))->label('ID Cliente'); ?>
    <?= $form->field($model, 'worker_id')->dropDownList(ArrayHelper::map(\backend\models\Worker::find()->asArray()->with('user')->all(), 'worker_id', 'worker_id', 'user.username'))->label('ID Funcionário');?>


    <div class="form-group">

        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
