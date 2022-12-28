<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Current_set $model */

$this->title = 'Create Current Set';
$this->params['breadcrumbs'][] = ['label' => 'Current Sets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="current-set-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
