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

    }

    $carro = new Carro('WHL2145', 'Branco');
    $moto = new Moto('ERQ3560', 'Preto');

    echo '<pre>';
    print_r($carro);
    echo '<br /><br />';
    print_r($moto);
    echo '</pre>';

    echo '<hr />';

    $carro->abrirTetoSolar();
    echo '<br />';
    $carro->acelerar();
    echo '<br />';
    $carro->freiar();

    echo '<hr />';

    $moto->empinar();
    echo '<br />';
    $moto->acelerar();
    echo '<br />';
    $moto->freiar();

?>