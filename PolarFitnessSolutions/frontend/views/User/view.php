<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\User $model */

$this->title = $model->username;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1>Bem Vindo <?= Html::encode($this->title) ?></h1>

    <div class="container d-flex justify-content-center">
            <div class="col-md-6 border-right">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Detalhes</h4>
                    </div>
                    <div class="row mt-3 ">
                        <span class="col-md-12"><?= DetailView::widget([
                                'model' => $model,
                                'options' => ['class' => 'col-md-12'],
                                'template' => '<div class="col-md-12"><label>{label}</label><label class="form-control">{value}</label></div>',
                                'attributes' => [
                                    [
                                        'label' => 'Nome',
                                        'value' => $model->username,
                                    ],
                                    [
                                        'label' => 'Email',
                                        'value' => $model->email,
                                    ],
                                    [
                                        'label' => 'Data de criação da conta',
                                        'value' => $model->created_at,
                                    ],
                                    [
                                        'label' => 'Data da ultima atualização da conta',
                                        'value' => $model->updated_at,
                                    ],
                                    [
                                        'label' => 'Rua',
                                        'value' => $model->street,
                                    ],
                                    [
                                        'label' => 'Codigo postal',
                                        'value' => $model->zip_code,
                                    ],
                                    [
                                        'label' => 'Número de telemóvel',
                                        'value' => $model->phone_number,
                                    ],
                                    [
                                        'label' => 'nif',
                                        'value' => $model->nif,
                                    ],
                                    [
                                        'label' => 'Género',
                                        'value' => $model->gender,
                                    ],

                                ],

                            ]) ?></span>
                        <div class="mt-5 text-center">
                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary profile-button']) ?>
                        </div>

            </div>
</div>
