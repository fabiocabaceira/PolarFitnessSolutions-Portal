<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\nutrition_plan $model */

$this->title = 'Atualizar Plano de Nutrição: ' . $model->nutritionname;
$this->params['breadcrumbs'][] = ['label' => 'Nutrição', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->client->user->username . ': ' . $model->nutritionname, 'url' => ['view', 'id' => $model->nutritionname]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="nutrition-plan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
