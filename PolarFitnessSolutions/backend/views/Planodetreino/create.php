<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Planodetreino $model */

$this->title = 'Create Planodetreino';
$this->params['breadcrumbs'][] = ['label' => 'Planodetreinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planodetreino-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
