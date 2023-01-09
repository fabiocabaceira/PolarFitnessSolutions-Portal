<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\NutritionBooking $model */

$this->title = 'Consulta de Nutrição de: ' . $model->client->user->username;
$this->params['breadcrumbs'][] = ['label' => 'Consultas de Nutrição', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nutrition-booking-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que quer apagar esta marcação?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute'=>'booking_date',
                'label'=>'Data',
                'value'=>$model->booking_date,
            ],
            [
                'attribute' => 'client_id',
                'label' => 'Cliente ',
                'value' => $model->client->user->username,
            ],
            [
                'attribute' => 'worker_id',
                'label' => 'Funcionário',
                'value' => $model->worker->user->username,
            ],
        ],
    ]) ?>

</div>
