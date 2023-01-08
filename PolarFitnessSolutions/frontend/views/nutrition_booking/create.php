<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\NutritionBooking $model */

$this->title = 'Criar Marcação de Consulta de Nutrição';

?>
<div class="nutrition-booking-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
