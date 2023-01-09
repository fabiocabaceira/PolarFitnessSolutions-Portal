<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Booking $model */

$this->title = 'Inscrição de: ' . $model->user->username;

?>
<div class="booking-view">

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que quer apagar esta inscrição?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'booking_date',
                'label'=>'Data',
                'value'=>$model->booking_date,
            ],
            [
                'attribute' => 'client_username',
                'label' => 'Cliente ',
                'value' => $model->user->username,
            ],
            [
                'attribute' => 'client_email',
                'label' => 'Email do cliente ',
                'value' => $model->user->email,
            ],
            [
                'attribute' => 'client_phone',
                'label' => 'Número de telemóvel do cliente ',
                'value' => $model->user->phone_number,
            ],
            [
                'attribute' => 'client_id',
                'label' => 'ID Cliente ',
                'value' => $model->user->id,
            ],
        ],
    ]) ?>

</div>
