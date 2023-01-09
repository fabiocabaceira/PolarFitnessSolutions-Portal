<?php
$this->title = 'Página Inicial';

/* Pesquisas na Base de Dados */
Yii::$app->user->getId();
$countusers = \common\models\User::find()->count();
$countclients = \backend\models\Client::find()->count();
$countworkers = \backend\models\Worker::find()->count();
$countsignedusers = \backend\models\User::find()->where(['subscription' => 'ativo'])->count();
$var = \backend\models\Client::find();
$countnonsignedusers = \backend\models\User::find()->where(['subscription' => 'inativo'])->count();
$countinscricoes = \backend\models\Booking::find()->count();
$countatribuicoes = \backend\models\WorkerClientRelation::find()->count();
$countexercicios = \backend\models\Exercise::find()->count();

/* Condicoes e conversoes de valores */
$percclient = ($countclients / $countusers) * 100;
$percclient = number_format((float)$percclient, 0, '.', '');
$percworker = ($countworkers / $countusers) * 100;
$percworker = number_format((float)$percworker, 0, '.', '');
$totalusersnonadmin = $countclients + $countworkers;
$percusersnonadmin = ($totalusersnonadmin / $countusers) * 100;
$percusersnonadmin = number_format((float)$percusersnonadmin, 0, '.', '');
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => 'Funcionários: '. $countworkers,
                'text' => 'Novo Funcionário',
                'icon' => 'fas fa-user-plus',
                'theme' => 'gradient-success',
                'linkText' => 'Criar',
                'linkUrl' => 'worker/create'
            ])?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => 'Atribuições: '. $countatribuicoes,
                'text' => 'Nova Atribuição',
                'icon' => 'fa-solid fa-user-group',
                'theme' => 'gradient-success',
                'linkText' => 'Criar',
                'linkUrl' => 'worker_client_relation/create'
            ])?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <?= \hail812\adminlte\widgets\SmallBox::widget([
            'title' => 'Exercícios: '. $countexercicios,
            'text' => 'Nova Atribuição',
            'icon' => 'fa-solid fa-dumbbell',
            'theme' => 'gradient-success',
            'linkText' => 'Adicionar',
            'linkUrl' => 'exercise/create'
        ])?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Funcionarios: ' .$countworkers,
                'number' => $percworker.'%',
                'icon' => 'fa-solid fa-user-nurse',
                'progress' => [
                    'width' => $percworker.'%',
                    'description' => 'Taxa de funcionarios'
                ]
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Clientes: '. $countclients,
                'number' => $percclient.'%',
                'icon' => 'fa-solid fa-user',
                'progress' => [
                    'width' => $percclient.'%',
                    'description' => 'Taxa de Clientes'
                ]
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Utilizadores: '. $totalusersnonadmin,
                'number' => $percusersnonadmin .'%',
                'icon' => 'fa-solid fa-users',
                'progress' => [
                    'width' => '100%',
                    'description' => 'Taxa de Clientes e Funcionarios'
                ]
            ]) ?>
        </div>
    </div>

    <div class="row">
        <?php if (($countinscricoes - $countnonsignedusers) <= $countsignedusers){?>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Inscricoes',
                'number' => $countinscricoes,
                'theme' => 'gradient-success',
                'icon' => 'fa-solid fa-book-bookmark',
            ])?>
        </div>
        <?php } else {?>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Inscricoes',
                'number' => $countinscricoes,
                'theme' => 'gradient-warning',
                'icon' => 'fa-solid fa-book-bookmark',
            ])?>
        </div>
        <?php }?>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Utilizadores Ativos',
                'number' => $countsignedusers,
                'theme' => 'gradient-warning',
                'icon' => 'fa-solid fa-book-bookmark',
            ])?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Utilizadores Inativos',
                'number' => $countnonsignedusers,
                'theme' => 'gradient-warning',
                'icon' => 'fa-solid fa-book-bookmark',
            ])?>
        </div>
    </div>

    <!--<div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <?/*= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Inscricoes',
                'number' => $countinscricoes,
                'theme' => 'gradient-warning',
                'icon' => 'fa-solid fa-book-bookmark',
            ])*/?>
        </div>

        <div class="col-md-4 col-sm-6 col-12">
            <?php /*$infoBox = \hail812\adminlte\widgets\InfoBox::begin([
                'text' => 'Likes',
                'number' => '41,410',
                'theme' => 'success',
                'icon' => 'far fa-thumbs-up',
                'progress' => [
                    'width' => '70%',
                    'description' => '70% Increase in 30 Days'
                ]
            ]) */?>
            <?/*= \hail812\adminlte\widgets\Ribbon::widget([
                'id' => $infoBox->id.'-ribbon',
                'text' => 'Ribbon',
            ]) */?>
            <?php /*\hail812\adminlte\widgets\InfoBox::end() */?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <?/*= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Numero Total de Clientes',
                'number' => $percclient,
                'icon' => 'fa-solid fa-user',
            ])*/?>
        </div>

        <div class="col-md-4 col-sm-6 col-12">
            <?/*= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Numero Total de Funcionarios',
                'number' => $countworkers,
                'icon' => 'fa-solid fa-user-nurse',
            ])*/?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?/*= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => '150',
                'text' => 'New Orders',
                'icon' => 'fas fa-shopping-cart',
            ]) */?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?php /*$smallBox = \hail812\adminlte\widgets\SmallBox::begin([
                'title' => '150',
                'text' => 'New Orders',
                'icon' => 'fas fa-shopping-cart',
                'theme' => 'success'
            ]) */?>
            <?/*= \hail812\adminlte\widgets\Ribbon::widget([
                'id' => $smallBox->id.'-ribbon',
                'text' => 'Ribbon',
                'theme' => 'warning',
                'size' => 'lg',
                'textSize' => 'lg'
            ]) */?>
            <?php /*\hail812\adminlte\widgets\SmallBox::end() */?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?/*= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => '44',
                'text' => 'User Registrations',
                'icon' => 'fas fa-user-plus',
                'theme' => 'gradient-success',
                'linkText' => 'Novo utilizador',
                'linkUrl' => 'worker/index'
            ])*/?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?/*= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Numero Total de Utilizadores',
                'number' => $countusers,
                'theme' => 'success',
                'icon' => 'fa-solid fa-users',
            ])*/?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?/*= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Inscricoes',
                'number' => $countinscricoes,
                'theme' => 'gradient-warning',
                'icon' => 'fa-solid fa-book-bookmark',
            ])*/?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?/*= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Numero Total de Utilizadores',
                'number' => $countusers,
                'icon' => 'fa-solid fa-users',
            ])*/?>
        </div>
    </div>-->
</div>