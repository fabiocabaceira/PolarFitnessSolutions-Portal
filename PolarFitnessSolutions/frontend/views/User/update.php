<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\User $model */

$this->title = 'Update User: ' . $model->username;
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
