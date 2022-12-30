<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Client $model */

$this->title = $user->username;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1>Cliente: <?= Html::encode($this->title) ?></h1>

    <div class="container d-flex justify-content-center">
        <div class="col-md-6 border-right">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-right">Detalhes</h4>
            </div>
            <div class="row mt-3 ">
                        <span class="col-md-12"><?= DetailView::widget([
                                'model' => $user,
                                'options' => ['class' => 'col-md-12'],
                                'template' => '<div class="col-md-12"><label>{label}</label><label class="form-control">{value}</label></div>',
                                'attributes' => [
                                    [
                                        'label' => 'username',
                                        'value' => $user->username,
                                    ],
                                    [
                                        'label' => 'email',
                                        'value' => $user->email,
                                    ],
                                    [
                                        'label' => 'created at',
                                        'value' => $user->created_at,
                                    ],
                                    [
                                        'label' => 'last updated at',
                                        'value' => $user->updated_at,
                                    ],
                                    [
                                        'label' => 'status',
                                        'value' => $user->status,
                                    ],
                                    [
                                        'label' => 'street',
                                        'value' => $user->street,
                                    ],
                                    [
                                        'label' => 'zip code',
                                        'value' => $user->zip_code,
                                    ],
                                    [
                                        'label' => 'phone_number',
                                        'value' => $user->phone_number,
                                    ],
                                    [
                                        'label' => 'nif',
                                        'value' => $user->nif,
                                    ],
                                    [
                                        'label' => 'gender',
                                        'value' => $user->gender,
                                    ],

                                ],

                            ]) ?></span>
                <div class="mt-5 text-center">
                    <?= Html::a('Update', ['update', 'id' => $model->client_id], ['class' => 'btn btn-primary profile-button']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->client_id], ['class' => 'btn btn-primary profile-button']) ?>
                </div>


            </div>
        </div>


