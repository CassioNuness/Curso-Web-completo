<?php

// ======================================================
// MODELO / CLASSE
// ======================================================
//
// A classe Funcionario representa uma abstração de um
// funcionário do mundo real.
//
// Em vez de representar tudo sobre uma pessoa,
// selecionamos apenas os dados e comportamentos
// importantes para este exemplo.
class Funcionario {

    // ======================================================
    // ATRIBUTOS
    // ======================================================
    //
    // Os atributos representam as características
    // que cada objeto Funcionario poderá possuir.
    public $nome = null;
    public $telefone = null;
    public $numFilhos = null;
    public $cargo = null;
    public $salario = null;

    // ======================================================
    // GETTERS E SETTERS MÁGICOS
    // ======================================================

    // O método mágico __set() é utilizado para definir
    // ou alterar o valor de um atributo do objeto.
    //
    // $atributo recebe o nome do atributo.
    // $valor recebe o valor que será armazenado.
    //
    // Exemplo:
    // $funcionario->__set('nome', 'José');
    function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    // O método mágico __get() é utilizado para recuperar
    // o valor de um atributo do objeto.
    //
    // Exemplo:
    // $funcionario->__get('nome');
    function __get($atributo) {
        return $this->$atributo;
    }

    /*
    ======================================================
    GETTERS E SETTERS TRADICIONAIS
    ======================================================

    Antes de utilizar os métodos mágicos __get() e __set(),
    seria necessário criar um setter e um getter específico
    para cada atributo.

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

    // ======================================================
    // MÉTODOS
    // ======================================================

    // Retorna uma frase com o resumo dos dados
    // do funcionário atual.
    //
    // $this representa o objeto que chamou o método.
    //
    // Se $y chamar o método, $this representa $y.
    // Se $x chamar o método, $this representa $x.
    function resumirCadFunc() {
        return
            $this->__get('nome') .
            " possui " .
            $this->__get('numFilhos') .
            " filho(s), " .
            "o número de telefone é: " .
            $this->__get('telefone') .
            ", trabalha como: " .
            $this->__get('cargo') .
            " e recebe o salário de: " .
            $this->__get('salario');
    }

    // Altera diretamente a quantidade de filhos
    // do objeto que chamou este método.
    function modificarNumFilhos($numFilhos) {

        // $this->numFilhos representa o atributo
        // numFilhos do objeto atual.
        $this->numFilhos = $numFilhos;
    }
}


/*
======================================================
EXEMPLO ANTIGO COM GETTERS E SETTERS TRADICIONAIS
======================================================

$y = new Funcionario();

$y->setNome('José');
$y->setNumFilhos(2);
$y->setTelefone('31 9 9300 6412');

echo $y->getNome() .
     ' possui ' .
     $y->getNumFilhos() .
     ' filho(s) e o número de telefone é: ' .
     $y->getTelefone();

echo '<hr />';

$x = new Funcionario();

$x->setNome('Maria');
$x->setNumFilhos(0);
$x->setTelefone('31 9 9300 0209');

echo $x->getNome() .
     ' possui ' .
     $x->getNumFilhos() .
     ' filho(s) e o número de telefone é: ' .
     $x->getTelefone();
*/


// ======================================================
// PRIMEIRO OBJETO
// ======================================================
//
// Cria um objeto da classe Funcionario.
// Este objeto representará José.
$y = new Funcionario();

// Define os valores dos atributos do objeto $y.
$y->__set('nome', 'José');
$y->__set('numFilhos', 2);
$y->__set('telefone', '31 9 9300 6412');
$y->__set('cargo', 'Programador Jr');
$y->__set('salario', 3000);

// Chama o método que monta e retorna
// o resumo dos dados do objeto $y.
echo $y->resumirCadFunc();

/*
Também seria possível montar a saída manualmente:

echo $y->__get('nome') .
     ' possui ' .
     $y->__get('numFilhos') .
     ' filho(s) e o número é: ' .
     $y->__get('telefone') .
     ' e trabalha como: ' .
     $y->__get('cargo') .
     ' e o salário que recebe é de: ' .
     $y->__get('salario');
*/

// Cria uma linha para separar os dois funcionários.
echo '<hr />';


// ======================================================
// SEGUNDO OBJETO
// ======================================================
//
// Cria outro objeto da classe Funcionario.
// Este objeto representará Maria.
//
// Os objetos $x e $y são independentes.
// Alterar um não modifica os dados do outro.
$x = new Funcionario();

// Define os valores dos atributos do objeto $x.
$x->__set('nome', 'Maria');
$x->__set('numFilhos', 0);
$x->__set('telefone', '31 9 9301 6522');
$x->__set('cargo', 'Professora');
$x->__set('salario', 4500);

// Como o objeto $x chamou o método,
// dentro de resumirCadFunc() o $this representa $x.
echo $x->resumirCadFunc();

/*
Também seria possível montar a saída manualmente:

echo $x->__get('nome') .
     ' possui ' .
     $x->__get('numFilhos') .
     ' filho(s) e o número é: ' .
     $x->__get('telefone') .
     ' e trabalha como: ' .
     $x->__get('cargo') .
     ' e o salário que recebe é: ' .
     $x->__get('salario');
*/

?>