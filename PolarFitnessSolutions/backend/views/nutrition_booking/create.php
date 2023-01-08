<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\NutritionBooking $model */

$this->title = 'Criar Marcação de consulta de Nutrição';
?>
<div class="nutrition-booking-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
