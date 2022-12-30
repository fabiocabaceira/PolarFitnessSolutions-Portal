<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;
/** @var \backend\models\WorkerCreateForm $model */
/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

?>
<div class="col-md-12 d-flex flex-column justify-content-center">
    <div class="col-lg-6 col-md-8 mx-auto">

        <div class="back">
            <div class="div-center">
                <div class="content">

                    <h3 class="text-center">Create Worker Account</h3>

                    <hr/>
                    <?php $form = ActiveForm::begin() ?>
                    <div class="user-box">
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'email') ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'zip_code')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'area')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'phone_number')->textInput() ?>

                        <?= $form->field($model, 'nif')->textInput() ?>

                        <?= $form->field($model, 'gender')->dropDownList([ 'Masculino' => 'Masculino', 'Feminino' => 'Feminino', 'Outro' => 'Outro', ], ['prompt' => '']) ?>

                    </div>
                    <div class="mt-5 text-center">

                        <?= Html::submitButton('Criar', ['class' => 'btn btn-outline-dark btn-block']) ?>

                    </div>
                    <spacer type="vertical" width="100" height="500"> ㅤ </spacer>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
