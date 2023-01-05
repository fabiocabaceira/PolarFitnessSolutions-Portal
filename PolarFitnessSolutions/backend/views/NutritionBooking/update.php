<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\NutritionBooking $model */

$this->title = 'Update Nutrition Booking: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nutrition Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nutrition-booking-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
