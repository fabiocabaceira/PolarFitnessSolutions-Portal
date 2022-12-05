<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Planonutricional $model */

$this->title = 'Create Planonutricional';
$this->params['breadcrumbs'][] = ['label' => 'Planonutricionals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planonutricional-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
