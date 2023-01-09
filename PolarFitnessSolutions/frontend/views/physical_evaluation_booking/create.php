<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\PhysicalEvaluationBooking $model */

$this->title = 'Criar Consulta de Avaliação Física';
?>
<div class="physical-evaluation-booking-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
