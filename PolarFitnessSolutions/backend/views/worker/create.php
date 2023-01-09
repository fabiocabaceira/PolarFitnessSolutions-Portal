<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Worker $model */

$this->title = 'Criar Novo Funcionário';
?>
<div class="worker-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
