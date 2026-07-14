<?php

    class veiculo {
        public $placa = null;
        public $cor = null;

        function acelerar() {
            echo 'Acelerar';
        }

        function freiar() {
            echo 'Freiar';
        }

        function trocarMarcha() {
            echo 'Desengatar embreagem com o pé e engatar marcha com a mão';
        }

    }

    class Caminhao extends veiculo {

    }

    class Carro extends veiculo {
        public $teto_solar = true;

        function __construct($placa, $cor) {
            $this->placa = $placa;
            $this->cor = $cor;
        }

        function abrirTetoSolar() {
            echo 'Abrir teto solar';
        }

        function alterarPosicaoVolante() {
            echo 'Alterar a posição do volante';
        }

    }

    class Moto extends veiculo {
        public $contraPesoGuiado = true;

        function __construct($placa, $cor) {
            $this->placa = $placa;
            $this->cor = $cor;
        }

        function empinar() {
            echo 'Empinar';
        }

        function trocarMarcha() {
            echo 'Desengatar embreagem com a mão e engatar marcha com o pé';
        }

    }

    $carro = new Carro('WHL2145', 'Branco');
    $moto = new Moto('ERQ3560', 'Preto');
    $caminhao = new Caminhao();

    $carro->trocarMarcha();

    echo '<br />';

    $moto->trocarMarcha();

    echo '<br />';

    $caminhao->trocarMarcha();
    
    
?>