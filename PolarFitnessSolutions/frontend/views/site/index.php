<?php
use yii\bootstrap5\Html;
/** @var yii\web\View $this */

$this->title = 'Polar Fitness Solutions';
?>
<div class="site-index">
    <div class="p-5 mb-4 bg-transparent rounded-3">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-4">Polar Fitness Solutions</h1>

            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <?php $domain = yii\helpers\Url::base(true);
                        echo Html::img($domain.'/imgs/carousel-bg1.png', ['alt' => 'Carousell one', 'class' => 'd-block w-100 carousel-1']) ?>
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Inscreva-se ja no nosso ginasio</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <?php $domain = yii\helpers\Url::base(true);
                        echo Html::img($domain.'/imgs/carousel-bg2.jpeg', ['alt' => 'Carousel two', 'class' => 'd-block w-100 carousel-1']) ?>
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <?php $domain = yii\helpers\Url::base(true);
                        echo Html::img($domain.'/imgs/carousel-bg3.jpeg', ['alt' => 'Carousel three', 'class' => 'd-block w-100 carousel-1']) ?>
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>


            <p class="fs-5 fw-light"></p>

        </div>
    </div>

    <div class="body-content">
<div>
    <script type="text/javascript">
        EscreverFraseRandom = function () {
            const frases = [];
            frases[0] = "Imagine uma nova história para sua vida e acredite nela. - Paulo Coelho";
            frases[1] = "Quer você acredite que consiga fazer uma coisa ou não, você está certo. - Henry Ford";
            frases[2] = "A disciplina é a mãe do êxito. - Ésquilo";
            frases[3] = "A persistência realiza o impossível. - Provérbio Chinês";
            frases[4] = "Está bem que você acredite em Deus. Mas vai armado. - Millôr Fernandes";
            frases[5] = "A vitalidade é demonstrada não apenas pela persistência, mas pela capacidade de começar de novo. - F. Scott Fitzgerald";
            var fraseAtual;
            const rand = Math.floor(Math.random() * frases.length);
            fraseAtual = rand;
            document.write(frases[rand]);
        }
    </script>

    <div class="w3-panel w3-leftbar w3-light-grey">
        <p class="w3-xlarge w3-serif">
   <i> <script type="text/javascript">EscreverFraseRandom();</script><i></p>

</div>

    </div>
</div>
