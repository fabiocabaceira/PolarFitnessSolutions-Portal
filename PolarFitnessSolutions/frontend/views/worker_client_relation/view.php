<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\WorkerClientRelation $model */

$this->title = $model->client->user->username;
$this->params['breadcrumbs'][] = ['label' => 'Os meus clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="worker-client-relation-view">

    <h1>Detalhes de <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //ID do cliente
            [
                'attribute' => 'client_id',
                'label' => 'ID do cliente'
            ],
            // Nome do cliente
            [
                'attribute' => 'user.username',
                'label' => 'Nome',
                'value' => function($model, $index) {
                    return $model->client->user->username;
                },
            ],
            // Email
            [
                'attribute' => 'email',
                'label' => 'Email',
                'value' => function($model, $index) {
                    return $model->client->user->email;
                },
            ],
            // Rua
            [
                'attribute' => 'user.street',
                'label' => 'Rua',
                'value' => function($model, $index) {
                    return $model->client->user->street;
                },
            ],
            // Código Postal
            [
                'attribute' => 'user.zip_code',
                'label' => 'Código Postal',
                'value' => function($model, $index) {
                    return $model->client->user->zip_code;
                },
            ],
            // Localidade
            [
                'attribute' => 'user.area',
                'label' => 'Localidade',
                'value' => function($model, $index) {
                    return $model->client->user->area;
                },
            ],
            // Número de telemóvel
            [
                'attribute' => 'user.phone_number',
                'label' => 'Número de telemóvel',
                'value' => function($model, $index) {
                    return $model->client->user->phone_number;
                },
            ],
            // Nif
            [
                'attribute' => 'user.nif',
                'label' => 'NIF',
                'value' => function($model, $index) {
                    return $model->client->user->nif;
                },
            ],
            // Género
            [
                'attribute' => 'user.gender',
                'label' => 'Género',
                'value' => function($model, $index) {
                    return $model->client->user->gender;
                },
            ],
        ],
    ]) ?>

</div>
