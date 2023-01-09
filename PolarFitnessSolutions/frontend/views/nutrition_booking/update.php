<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\NutritionBooking $model */

$this->title = 'Atualizar Marcação de Consulta de Nutrição: ';
?>
<div class="nutrition-booking-update">

    <?= $this->render('_form_update', [
        'model' => $model,
    ]) ?>

</div>
