<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\SignupForm $model */

$this->title = 'Criar Cliente Novo';

?>
<div class="client-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
