<?php

//modelo
class Funcionario {

    //atributos
    public $nome = 'José';
    public $telefone = '31 9 9300-2513';
    public $numFilhos = 2;

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
echo $y->resumirCadFunc();

echo '<br />';

$y->modificarNumFilhos(3);
echo $y->resumirCadFunc();

echo '<hr />';

$x = new Funcionario();
echo $x->resumirCadFunc();

echo '<br />';

$x->modificarNumFilhos(1);
echo $x->resumirCadFunc();

?>