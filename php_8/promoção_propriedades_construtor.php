<?php

    /*
        FORMA TRADICIONAL

        Antes do PHP 8, normalmente declaramos as propriedades
        da classe e depois fazemos a atribuição dos valores
        recebidos pelo construtor.

    class Produto {

        public string $nome = "";
        public float $valor = 0;

        public function __construct($nome, $valor) {
            $this->nome = $nome;
            $this->valor = $valor;
        }
    }

    */


    /*
        PHP 8 - CONSTRUCTOR PROPERTY PROMOTION

        Podemos declarar as propriedades diretamente
        nos parâmetros do construtor.

        O PHP automaticamente cria as propriedades
        e atribui os valores recebidos a elas.

        Isso evita a necessidade de escrever:

        $this->nome = $nome;
        $this->valor = $valor;
    */
    class Produto {

        public function __construct(
            public string $nome = "",
            public float $valor = 0
        ) {}

    }


    // Instancia Produto utilizando argumentos posicionais.
    // A ordem dos valores deve seguir a ordem dos parâmetros
    // definidos no construtor.
    $produto = new Produto('Smartphone', 1500);

    echo "Produto: " . $produto->nome;
    echo "<br>";
    echo "Valor: " . $produto->valor;


    echo "<hr>";


    /*
        Instancia outro Produto utilizando argumentos nomeados.

        Essa é outra feature do PHP 8.

        Como informamos o nome de cada parâmetro,
        podemos alterar a ordem dos argumentos.
    */
    $produto2 = new Produto(
        valor: 2000,
        nome: 'Notebook'
    );

    echo "Produto: " . $produto2->nome;
    echo "<br>";
    echo "Valor: " . $produto2->valor;    

?>