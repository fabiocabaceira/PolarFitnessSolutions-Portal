<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Booking $model */

$this->title = $search->booking_date;

\yii\web\YiiAsset::register($this);
?>
<div class="physical-evaluation-booking-view">

</div>
<div class="user-view">

    <h1>Data: <?= Html::encode($this->title) ?></h1>

    <div class="container d-flex justify-content-center">
        <div class="col-md-6 border-right">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-right">Detalhes</h4>
            </div>
            <div class="row mt-3 ">
                        <span class="col-md-12"><?= DetailView::widget([
                                'model' => $search,
                                'options' => ['class' => 'col-md-12'],
                                'template' => '<div class="col-md-12"><label>{label}</label><label class="form-control">{value}</label></div>',
                                'attributes' => [
                                    [
                                        'label' => 'Nome',
                                        'value' => $search->user_id,
                                    ],
                                    [
                                        'label' => 'Data de Inscricao',
                                        'value' => $search->booking_date,
                                    ],

                                ],

                            ]) ?></span>
                <div class="mt-5 text-center">
                    <?= Html::a('Apagar', ['deletebooking', 'id' => $search->id], ['class' => 'btn btn-primary profile-button']) ?>
                </div>
            </div>
        </div>
