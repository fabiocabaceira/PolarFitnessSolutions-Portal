<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\PhysicalEvaluationBooking $model */

$this->title = 'Criação de Consulta de Avaliação Fisica';
?>
<div class="physical-evaluation-booking-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
