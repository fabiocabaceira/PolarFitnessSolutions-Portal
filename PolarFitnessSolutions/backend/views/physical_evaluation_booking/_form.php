<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\PhysicalEvaluationBooking $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="site-signup">
    <div class="col-md-12 d-flex flex-column justify-content-center">
        <div class="col-lg-6 col-md-8 mx-auto">
            <dilogin-card-bodyv class="card-body login-card-body">

                <div class="back">
                    <div class="div-center">
                        <div class="content">

                            <h3 class="text-center">Marcar Inscrição</h3>
                            <?php $form = ActiveForm::begin() ?>
                            <div class="user-box">
                                <?= $form->field($model, 'booking_date')->widget(DateTimePicker::classname(), [
                                    'options' => ['placeholder' => 'Escolha um dia e uma hora para a sua inscrição'],
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'hoursDisabled' => '0,1,2,3,4,5,6,7,8,9,19,20,21,22,23',
                                        'minuteStep' => 15,
                                    ]
                                ]);?>
                                <?= $form->field($model, 'client_id')->dropDownList(ArrayHelper::map(\backend\models\Client::find()->asArray()->with('user')->all(), 'client_id', 'client_id', 'user.username')); ?>
                                <?= $form->field($model, 'worker_id')->dropDownList(ArrayHelper::map(\backend\models\Worker::find()->asArray()->with('user')->all(), 'worker_id', 'worker_id', 'user.username'))?>
                            </div>
                            <spacer type="horizontal" width="100" height="100"> ㅤ </spacer>
                            <div class="d-grid gap-2 col-8 mx-auto">

                                <?= Html::submitButton('Marcar', ['class' => 'btn btn-outline-dark']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
        </div>