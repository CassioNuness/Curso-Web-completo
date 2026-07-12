<?php

//modelo
class Funcionario {

    //atributos
    public $nome = null;
    public $telefone = null;
    public $numFilhos = null;

    //getters e setters
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

    //métodos
    function resumirCadFunc() {
        return "$this->nome possui $this->numFilhos filho(s)";
    }

    function modificarNumFilhos($numFilhos) {
        //afetar um atributo do objeto
        $this->numFilhos = $numFilhos;
    }

}

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

?>