<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\PhysicalEvaluationBooking $model */

$this->title = 'Update Physical Evaluation Booking: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Physical Evaluation Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="physical-evaluation-booking-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
