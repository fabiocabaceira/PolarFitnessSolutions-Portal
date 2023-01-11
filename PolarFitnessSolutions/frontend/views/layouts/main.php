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
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
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

$subscription = \common\models\User::find()->where(['id' => $id])->andwhere(['subscription' => 'ativo'])->one();
 if (Yii::$app->user->can('funcionario')) {

         $menuItems = [
             ['label' => 'Conta', 'url' => ['/user/view?id='.$id]],
             ['label' => 'Clientes', 'url' => ['/worker_client_relation/index']],
             ['label' => 'Planos de treino', 'url' => ['/workout_plan/index']],
             ['label' => 'Nutrição', 'url' => ['/nutrition_plan/index']],
             ['label' => 'Consultas de Avaliação Física', 'url' => ['physical_evaluation_booking/index']],
             ['label' => 'Consultas de Nutrição', 'url' => ['nutrition_booking/index']],
         ];

        } else if(Yii::$app->user->can('utilizador')) {
    if  (!$subscription) {
        $menuItems = [
            ['label' => 'Conta', 'url' => ['/user/view?id=' . $id]],
            ['label' => 'Inscreva-se', 'url' => ['/site/booking']],
            ['label' => 'Visualizar Inscricao', 'url' => ['site/viewbooking']],
        ];
    }
    else {
        $menuItems = [
            ['label' => 'Conta', 'url' => ['/user/view?id=' . $id]],
            ['label' => 'Planos de Treino', 'url' => ['/workout_plan/index']],
            ['label' => 'Nutrição', 'url' => ['/nutrition_plan/index']],
            ['label' => 'Consultas de Avaliação Física', 'url' => ['physical_evaluation_booking/index']],
            ['label' => 'Consultas de Nutrição', 'url' => ['nutrition_booking/index']],
        ];
    }
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
