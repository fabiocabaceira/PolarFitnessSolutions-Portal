<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
$id = Yii::$app->user->id;
AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">

<header>

    <?php
    $domain = yii\helpers\Url::base(true);

    NavBar::begin([
            'innerContainerOptions' => ['class' => 'container-fluid'],
        'brandLabel' => Html::img($domain.'/imgs/logo.png', ['alt' => 'Imagem do Polar', 'class' => 'image-nav img-fluid']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark fixed-top bg-custom-2 stroke',
        ],

    ]);

    $menuItems = [
        ['label' => 'Criar conta', 'url' => ['/site/signup']],
        ];

 if (Yii::$app->user->can('funcionario')) {
            $menuItems = [
                ['label' => 'Detalhes conta', 'url' => ['/user/view?id='.$id]],
                ['label' => 'Mensagens', 'url' => ['/site/signup']],
                ['label' => 'Gerir Planos de treino', 'url' => ['/site/signup']],
                ['label' => 'Clientes', 'url' => ['/client/index']],
                ['label' => 'Atribuir planos de treino', 'url' => ['/site/signup']],
                ['label' => 'Marcar Consultas', 'url' => ['/site/signup']],
            ];
        } else if(Yii::$app->user->can('utilizador')) {
            $menuItems = [
                ['label' => 'Detalhes conta', 'url' => ['/user/view?id='.$id]],
                ['label' => 'Apoio ao Cliente', 'url' => ['/site/contact']],
                ['label' => 'Inscreva-se', 'url' => ['/site/booking']],
                ['label' => 'Mensagens', 'url' => ['/site/signup']],
            ];
        }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
        'items' => $menuItems,
    ]);

    if (Yii::$app->user->isGuest) {
        echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none my-btn']]),['class' => ['d-flex']]);
    } else {
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link login text-decoration-none my-btn']
            )
            . Html::endForm();
    }
    NavBar::end();

    ?>

</header>

<main role="main" class="flex-shrink-0">
    <div class="container-fluid">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
