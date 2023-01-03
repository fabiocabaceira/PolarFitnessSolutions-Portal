<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Nutrition_plan $model */

$this->title = 'Create Nutrition Plan';
$this->params['breadcrumbs'][] = ['label' => 'Nutrition Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nutrition-plan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
