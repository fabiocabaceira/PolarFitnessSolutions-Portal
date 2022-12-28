<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Physical_evaluation $model */

$this->title = 'Update Physical Evaluation: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Physical Evaluations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="physical-evaluation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
