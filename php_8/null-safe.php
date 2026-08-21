<?php

    /*
    $objeto = null;

    if(isset($objeto) && $objeto != null) {
        $objeto->total();
    }

    $objeto?->total(); // Null-safe operator
    */


    class Funcionario {

        public function __construct(
            private string $nome = "",
            private float $salario = 0.0
        ) {}

        public function info() {
            return "Nome: {$this->nome} - Salário: {$this->salario}";
        }

    }


    class FolhaPagamento {

        private $funcionarios = null;

        public function __construct() {
            $this->funcionarios = [
                new Funcionario("João", 1000),
                new Funcionario("Maria", 2000),
                new Funcionario("José", 3000),
                new Funcionario("Ana", 4000)
            ];
        }

        public function getTotalFuncionarios() {
            return count($this->funcionarios);
        }

        public function getFuncionarios() {
            return $this->funcionarios[1];
        }

    }


    $folhaPagamento = new FolhaPagamento();

    //$folhaPagamento = null;


    /*
    if($folhaPagamento != null && isset($folhaPagamento)) {
        echo $folhaPagamento->getTotalFuncionarios();
    }
    */


    // Null-safe operator (PHP 8)
    echo $folhaPagamento?->getTotalFuncionarios();
    echo "<br>";
    print_r($folhaPagamento?->getFuncionarios()->info());

?>