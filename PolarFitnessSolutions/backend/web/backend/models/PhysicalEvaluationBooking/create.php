<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\PhysicalEvaluationBooking $model */

$this->title = 'Create Physical Evaluation Booking';
$this->params['breadcrumbs'][] = ['label' => 'Physical Evaluation Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="physical-evaluation-booking-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
