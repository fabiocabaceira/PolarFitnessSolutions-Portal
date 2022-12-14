<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Client $model */

$this->title = $model->user->username;
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
                                        'label' => 'Nome',
                                        'value' => $user->username,
                                    ],
                                    [
                                        'label' => 'Email',
                                        'value' => $user->email,
                                    ],
                                    [
                                        'label' => 'Data de criação da conta',
                                        'value' => Yii::$app->formatter->asDatetime($model->user->created_at),
                                    ],
                                    [
                                        'label' => 'Data da última atualização da conta',
                                        'value' => Yii::$app->formatter->asDatetime($model->user->updated_at),
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
                    <?= Html::a('Atualizar', ['update', 'client_id' => $model->client_id], ['class' => 'btn btn-primary profile-button']) ?>
                </div>


            </div>
        </div>


