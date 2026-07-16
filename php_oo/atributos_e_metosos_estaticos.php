<?php

    class Exemplo {
        public static $atributo1 = 'Eu sou um atributo estático';
        public $atributo2 = 'Eu sou um atributo normal';

        public static function metodo1() {
            echo 'Eu sou um atributo estático';
        }

        public function metodo2() {
            echo 'Eu sou um atributo normal';
        }

    }

    // echo Exemplo::$atributo1;
    // echo '<br />';
    // Exemplo::metodo1();

    // $x = new Exemplo();
    // echo $x->atributo2;

    echo Exemplo::$atributo1;
    

?>