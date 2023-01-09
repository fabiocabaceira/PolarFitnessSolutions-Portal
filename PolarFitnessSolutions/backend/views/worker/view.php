<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Worker $model */

$this->title = 'Detalhes de: ' . $user->username;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <div class="col-md-12 d-flex flex-column justify-content-center">
        <div class="col-md-6 border-right">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-right">Detalhes de:  . $user->username</h4>
            </div>
            <div class="row mt-3 ">
                        <span class="col-md-12"><?= DetailView::widget([
                                'model' => $user,
                                'options' => ['class' => 'col-md-12'],
                                'template' => '<div class="col-md-12"><label>{label}</label><label class="form-control">{value}</label></div>',
                                'attributes' => [
                                    [
                                        'label' => 'Nome',
                                        'value' => $user->username,
                                    ],
                                    [
                                        'label' => 'Estado da Subscrição',
                                        'value' => $user->subscription,
                                    ],
                                    [
                                        'label' => 'Email',
                                        'value' => $user->email,
                                    ],
                                    [
                                        'label' => 'Data de criação da conta',
                                        'value' => $user->created_at,
                                    ],
                                    [
                                        'label' => 'Data da última atualização da conta',
                                        'value' => $user->updated_at,
                                    ],

                                    [
                                        'label' => 'Rua',
                                        'value' => $user->street,
                                    ],
                                    [
                                        'label' => 'Código postal',
                                        'value' => $user->zip_code,
                                    ],
                                    [
                                        'label' => 'Número de telemóvel',
                                        'value' => $user->phone_number,
                                    ],
                                    [
                                        'label' => 'NIF',
                                        'value' => $user->nif,
                                    ],
                                    [
                                        'label' => 'Género',
                                        'value' => $user->gender,
                                    ],

                                ],

                            ]) ?></span>
                <div class="mt-5 text-center">

                    <?= Html::submitButton('Criar', ['class' => 'btn btn-outline-dark btn-block']) ?>

                </div>
            </div>
        </div>

