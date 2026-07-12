<?php

//modelo
class Funcionario {

    //atributos
    public $nome = null;
    public $telefone = null;
    public $numFilhos = null;
    public $cargo = null;
    public $salario = null;

    //getters e setters (overloading / sobrecarga)
    function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    function __get($atributo) {
        return $this->$atributo;
    }

    /*
    function setNome($nome) {
        $this->nome = $nome;
    }

    function setNumFilhos($numFilhos) {
        $this->numFilhos = $numFilhos;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function getNome() {
        return $this->nome;
    }

    function getNumFilhos() {
        return $this->numFilhos;
    }

    function getTelefone() {
        return $this->telefone;
    }
    */

    //métodos
    function resumirCadFunc() {
        return "$this->nome possui $this->numFilhos filho(s)";
    }

    function modificarNumFilhos($numFilhos) {
        //afetar um atributo do objeto
        $this->numFilhos = $numFilhos;
    }

}

/*
$y = new Funcionario();
$y->setNome('José');
$y->setNumFilhos(2);
$y->setTelefone('31 9 9300 6412');
// echo $y->resumirCadFunc();
echo $y->getNome() .
     ' possui ' .
     $y->getNumFilhos() .
     ' filho(s) e meu número é: ' .
     $y->getTelefone();

echo '<hr />';

$x = new funcionario();
$x->setNome('Maria');
$x->setNumFilhos(0);
$x->setTelefone('31 9 9300 0209');
echo $x->getNome() .
     ' possui ' .
     $x->getNumFilhos() .
     ' filho(s) e meu número é: ' .
     $x->getTelefone();

*/

$y = new Funcionario();
$y->__set('nome', 'José');
$y->__set('numFilhos', 2);
$y->__set('telefone', '31 9 9300 6412');
$y->__set('cargo', 'Programador jr');
$y->__set('salario', '3000');
// echo $y->resumirCadFunc();
echo $y->__get('nome') .
     ' possui ' .
     $y->__get('numFilhos') .
     ' filho(s) e o número é: ' .
     $y->__get('telefone') . 
     ' e trabalha como: ' .
     $y->__get('cargo') .
     ' e o salário que recebe é: ' .
     $y->__get('salario');

echo '<hr />';

$x = new Funcionario();
$x->__set('nome', 'Maria');
$x->__set('numFilhos', 0);
$x->__set('telefone', '31 9 9301 6522');
$x->__set('cargo', 'Professor(a)');
$x->__set('salario', '4500');
// echo $y->resumirCadFunc();
echo $x->__get('nome') .
     ' possui ' .
     $x->__get('numFilhos') .
     ' filho(s) e o número é: ' .
     $x->__get('telefone') . 
     ' e trabalha como: ' .
     $x->__get('cargo') .
     ' e o salário que recebe é: ' .
     $x->__get('salario');

?>