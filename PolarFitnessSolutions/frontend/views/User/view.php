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
                                        'value' => Yii::$app->formatter->asDatetime($model->created_at),
                                    ],
                                    [
                                        'label' => 'Data da última atualização da conta',
                                        'value' => Yii::$app->formatter->asDatetime($model->updated_at),
                                    ],
                                    [
                                        'label' => 'Rua',
                                        'value' => $model->street,
                                    ],
                                    [
                                        'label' => 'Código postal',
                                        'value' => $model->zip_code,
                                    ],
                                    [
                                        'label' => 'Localidade',
                                        'value' => $model->area,
                                    ],
                                    [
                                        'label' => 'Número de telemóvel',
                                        'value' => $model->phone_number,
                                    ],
                                    [
                                        'label' => 'NIF',
                                        'value' => $model->nif,
                                    ],
                                    [
                                        'label' => 'Género',
                                        'value' => $model->gender,
                                    ],

                                ],

                            ]) ?></span>
                        <div class="mt-5 text-center">
                            <?php if(Yii::$app->user->can('utilizador')){?>
                                <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary profile-button']); ?>
                            <?php } ?>
                        </div>

            </div>
</div>
