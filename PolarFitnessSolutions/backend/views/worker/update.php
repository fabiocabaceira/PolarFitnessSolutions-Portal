<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Worker $model */
$user = \frontend\models\User::findOne($model->worker_id);
$this->title = 'Atualizar Funcionário: ' . $user->username;

?>
<div class="worker-update">


    <?= $this->render('_formUpdate', [
        'user' => $user,
        'model' => $model,
    ]) ?>

</div>
