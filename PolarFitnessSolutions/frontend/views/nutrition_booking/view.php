<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\NutritionBooking $model */

$this->title =  $model->client->user->username;
$this->params['breadcrumbs'][] = ['label' => 'Consultas de Nutrição', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nutrition-booking-view">

    <h1><?= 'Consulta de Nutrição de: ' . Html::encode($this->title) ?></h1>
    <?php if (Yii::$app->user->can('funcionario')){ ?>
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
    <?php }
    ?>

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
