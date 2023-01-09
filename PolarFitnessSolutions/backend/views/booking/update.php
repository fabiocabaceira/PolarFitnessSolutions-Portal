<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Booking $model */

$user = \backend\models\User::findOne($model->user_id);
$this->title = 'Atualizar Inscrição de: ' . $user->username;
?>
<div class="booking-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
