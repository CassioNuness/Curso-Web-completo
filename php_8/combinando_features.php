<?php

    class Produto {

        public function __construct(public string $nome = "", public float $valor = 0) {}

    }

    $produto = new Produto(valor: 1500, nome: 'Smartphone');

    echo "Produto: " . $produto->nome;
    echo "<br>";
    echo "Valor: " . $produto->valor;

    echo "<hr>";

    $produto2 = new Produto(
        valor: 2000,
        nome: 'Notebook'
    );

    echo "Produto: " . $produto2->nome;
    echo "<br>";
    echo "Valor: " . $produto2->valor;    

?>