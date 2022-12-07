<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title ='Cliente: '. $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'email:email',
            [
                'attribute'=>'status',
                'value'=> function ($model){
                    if($model->status ==0){
                        return 'Apagado';
                    }
                    if ($model->status ==9){
                        return 'Inativo';
                    }
                    if ($model->status ==10){
                        return 'Ativo';
                    }
                    else{
                        return 'Invalido';
                    }
                },
            ],
            'rua',
            'codigo_postal',
            'localidade',
            'telefone',
            'nif',
            'genero',
            'password_hash',
            'auth_key',
            'password_reset_token',
            'created_at',
            'updated_at',
            'verification_token',
            'ginasio_id',
        ],
    ]) ?>

</div>
