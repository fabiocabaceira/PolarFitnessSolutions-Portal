<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\nutrition_plan $model */

$this->title = $model->nutritionname;
$this->params['breadcrumbs'][] = ['label' => 'Planos de Nutrição', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nutrition-plan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que quer apagar este plano de nutrição?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute'=>'nutritionname',
                'label'=>'Nome',
                'value'=>$model->nutritionname,
            ],
            [
                'attribute' => 'content',
                'label' => 'Conteúdo',
                'value' => $model->content,
                'format'=>'ntext'
            ],
            [
                'attribute' => 'created_at',
                'label' => 'Criado a ',
                'value' => Yii::$app->formatter->asDatetime($model->created_at),
            ],
            [
                'attribute' => 'updated_at',
                'label' => 'Atualizado a ',
                'value' => Yii::$app->formatter->asDatetime($model->updated_at),
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
