<?php

use yii\helpers\Html;


/** @var yii\web\View $this */
/** @var backend\models\client $model */
$user = \backend\models\User::findOne($model->client_id);
$this->title = 'Atualizar Cliente: ' . $user->username;

?>
<div class="client-update">

    <?= $this->render('_formUpdate', [
        'user' => $user,
        'model' => $model,
    ]) ?>

</div>
