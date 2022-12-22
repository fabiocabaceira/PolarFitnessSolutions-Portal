<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
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

                        <h3 class="text-center">Signup</h3>

                        <hr/>
                        <?php $form = \yii\bootstrap4\ActiveForm::begin() ?>
                        <div class="user-box">
                            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($model, 'email') ?>

                            <?= $form->field($model, 'password')->passwordInput() ?>

                            <?= $form->field($model, 'rua')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'codigo_postal')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'localidade')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'telefone')->textInput() ?>

                            <?= $form->field($model, 'nif')->textInput() ?>

                            <?= $form->field($model, 'genero')->dropDownList([ 'Masculino' => 'Masculino', 'Feminimo' => 'Feminimo', 'Outro' => 'Outro', ], ['prompt' => '']) ?>

                            <?= $form->field($model, 'role')->dropDownList([ 1 => 'Admin', 2 => 'Funcionario', 3 => 'Cliente', ], ['prompt' => '']) ?>
                        </div>
                        <spacer type="horizontal" width="100" height="100"> ㅤ </spacer>
                        <div class="d-grid gap-2 col-8 mx-auto">

                            <?= Html::submitButton('Signup', ['class' => 'btn btn-outline-dark']) ?>
                        </div>
                        <?php \yii\bootstrap4\ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
    </div>
