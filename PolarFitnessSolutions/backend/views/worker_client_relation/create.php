<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\WorkerClientRelation $model */

$this->title = 'Atribuição de Profissionais';
$this->params['breadcrumbs'][] = ['label' => 'Atribuição de Profissionais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-client-relation-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
