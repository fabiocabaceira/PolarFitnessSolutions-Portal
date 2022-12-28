<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Physical_evaluation $model */

$this->title = 'Create Physical Evaluation';
$this->params['breadcrumbs'][] = ['label' => 'Physical Evaluations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="physical-evaluation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
