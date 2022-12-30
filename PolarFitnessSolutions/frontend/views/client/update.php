<?php

use frontend\models\Client;
use frontend\models\User;
use yii\helpers\Html;


/** @var yii\web\View $this */
/** @var frontend\models\client $model */

$this->title = $user->username;

?>
<div class="client-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formUpdate', [
        'user' => $user,
        'model' => $model,
    ]) ?>


</div>
