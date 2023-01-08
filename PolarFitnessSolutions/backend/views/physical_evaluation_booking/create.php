<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\PhysicalEvaluationBooking $model */


?>
<div class="physical-evaluation-booking-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
