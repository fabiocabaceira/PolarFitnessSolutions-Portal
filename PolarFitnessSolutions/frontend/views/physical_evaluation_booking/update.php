<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\PhysicalEvaluationBooking $model */

$this->title = 'Atualizar Marcação de Consulta de Avaliação Fisíca:';
?>
<div class="physical-evaluation-booking-update">


    <?= $this->render('_form_update', [
        'model' => $model,
    ]) ?>

</div>
