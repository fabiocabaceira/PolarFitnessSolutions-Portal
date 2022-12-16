<?php
use yii\helpers\Html;
?>
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

                <h3 class="text-center">Backend Login</h3>

            <hr/>
            <?php $form = \yii\bootstrap4\ActiveForm::begin() ?>
                <div class="user-box">
                    <?= $form->field($model,'username')?>
                </div>
                <div class="user-box">
                    <?= $form->field($model,'password')->passwordInput() ?>
                </div>
            <spacer type="horizontal" width="100" height="100"> ㅤ </spacer>
            <div class="d-grid gap-2 col-8 mx-auto">
            <?= Html::submitButton('Sign In', ['class' => 'btn btn-outline-dark']) ?>
            </div>
            <?php \yii\bootstrap4\ActiveForm::end(); ?>
        </div>
    </div>
</div>
</div>
