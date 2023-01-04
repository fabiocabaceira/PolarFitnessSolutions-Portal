<?php

use yii\helpers\Html;


/** @var yii\web\View $this */
/** @var backend\models\client $model */

$this->title = 'Update Client: ' . $model->client_id;
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->client_id, 'url' => ['view', 'client_id' => $model->client_id]];
$this->params['breadcrumbs'][] = 'Update';
$user = \frontend\models\User::findOne($model->client_id);
?>
<div class="client-update">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= $this->render('_formUpdate', [
        'user' => $user,
        'model' => $model,
    ]) ?>

</div>
