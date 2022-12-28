<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Gym_area $model */

$this->title = 'Create Gym Area';
$this->params['breadcrumbs'][] = ['label' => 'Gym Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gym-area-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
