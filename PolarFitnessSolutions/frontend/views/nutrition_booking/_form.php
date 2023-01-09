<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\NutritionBooking $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="site-signup">
    <div class="col-md-12 d-flex flex-column justify-content-center">
        <div class="col-lg-6 col-md-8 mx-auto">
            <dilogin-card-bodyv class="card-body login-card-body">
                <div class="back">
                    <div class="div-center">
                        <div class="content">
                            <div class="form-image">
                                <?php $domain = yii\helpers\Url::base(true);
                                echo Html::img($domain.'/imgs/Polar_logo_black.png', ['alt' => 'Imagem do Polar', 'class' => 'image-login img-fluid']) ?>
                            </div>

                            <h3 class="text-center">Criar Marcação</h3>
                            <?php $form = ActiveForm::begin() ?>
                            <div class="user-box">
                                <?= $form->field($model, 'booking_date')->widget(DateTimePicker::classname(), [
                                    'options' => ['placeholder' => 'Escolha um dia e uma hora para a sua marcação'],
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'hoursDisabled' => '0,1,2,3,4,5,6,7,8,9,19,20,21,22,23',
                                        'minuteStep' => 15,
                                        'startDate' => date('Y-m-d H:i:s'),
                                    ]
                                ])->label('Data da Marcação');?>
                            </div>

                            <?= $form->field($model, 'client_id')->dropDownList(ArrayHelper::map(\frontend\models\Client::find()->asArray()->with('user')->all(), 'client_id', 'client_id', 'user.username'))->label('ID do Cliente'); ?>
                            <?= $form->field($model, 'worker_id')->hiddenInput(['value'=> Yii::$app->user->id])->label(false); ?>
                            <spacer type="horizontal" width="100" height="100"> ㅤ </spacer>
                            <div class="d-grid gap-2 col-8 mx-auto">

                                <?= Html::submitButton('Marcar', ['class' => 'btn btn-outline-dark']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
        </div>
