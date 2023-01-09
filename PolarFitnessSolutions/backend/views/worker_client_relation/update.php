<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\WorkerClientRelation $model */

$this->title = 'Atualizar Relação: ' . $model->client->user->username . ' e '. $model->worker->user->username;
$this->params['breadcrumbs'][] = ['label' => 'Atribuição de Profissionais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->client->user->username . ' e '. $model->worker->user->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="worker-client-relation-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
