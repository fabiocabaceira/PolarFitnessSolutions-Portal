<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\NutritionBooking $model */

$this->title =  'Atualizar Marcação de Nutrição:';

?>
<div class="nutrition-booking-update">

    <?= $this->render('_form_update', [
        'model' => $model,
    ]) ?>

</div>
