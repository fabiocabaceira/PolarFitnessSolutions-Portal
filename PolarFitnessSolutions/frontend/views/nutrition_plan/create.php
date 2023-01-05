<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\nutrition_plan $model */

$this->title = 'Criar Plano de Nutrição';
$this->params['breadcrumbs'][] = ['label' => 'Nutrição', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nutrition-plan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
