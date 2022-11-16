<?php

/** @var yii\web\View $this */

$this->title = 'Polar Fitness Solutions';
?>
<div class="site-index">
    <div class="p-5 mb-4 bg-transparent rounded-3">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-4">Polar Fitness Solutions</h1>
           
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
