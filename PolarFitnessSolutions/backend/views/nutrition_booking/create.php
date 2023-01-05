<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\NutritionBooking $model */

$this->title = 'Create Nutrition Booking';
$this->params['breadcrumbs'][] = ['label' => 'Nutrition Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nutrition-booking-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
