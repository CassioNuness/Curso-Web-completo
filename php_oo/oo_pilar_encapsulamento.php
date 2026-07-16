<?php

// ======================================================
// PILAR DO ENCAPSULAMENTO - PARTE 2
// ======================================================
//
// Encapsulamento controla quem pode acessar
// atributos e métodos de uma classe.
//
// Modificadores de acesso:
//
// private
// -> Só pode ser acessado dentro da própria classe.
//
// protected
// -> Pode ser acessado dentro da própria classe
//    e também pelas classes filhas.
//
// public
// -> Pode ser acessado de qualquer lugar.
//
// Neste exemplo também veremos como esses modificadores
// funcionam quando existe herança.
//
// ======================================================


// ======================================================
// CLASSE PAI
// ======================================================

class Pai {

    // Atributo privado:
    // existe dentro da classe Pai,
    // mas não pode ser acessado diretamente pela classe Filho.
    private $nome = 'Jorge';

    // Atributo protegido:
    // pode ser acessado pela classe Pai
    // e também por classes que herdarem de Pai.
    protected $sobrenome = 'Silva';

    // Atributo público:
    // pode ser acessado de dentro ou de fora da classe.
    public $humor = 'Feliz';


    // Método mágico responsável por retornar
    // o valor de um atributo.
    public function __get($attr) {
        return $this->$attr;
    }


    // Método mágico responsável por alterar
    // o valor de um atributo.
    public function __set($attr, $value) {
        $this->$attr = $value;
    }


    // Método privado:
    // só existe e pode ser executado dentro da classe Pai.
    //
    // A classe Filho não herda esse método como acessível.
    private function executarMania() {
        echo 'Assobiar';
    }


    // Método protegido:
    // pode ser utilizado pela classe Pai
    // e também por classes filhas.
    protected function responder() {
        echo 'Oi';
    }


    // Método público:
    // pode ser chamado de fora da classe.
    public function executarAcao() {

        // Gera um número aleatório entre 1 e 10.
        $x = rand(1, 10);

        // Se o número estiver entre 1 e 8,
        // executa o método responder().
        if ($x >= 1 && $x <= 8) {

            // Como responder() é protected,
            // ele pode ser chamado dentro da classe.
            //
            // Se uma classe filha sobrescrever responder(),
            // será utilizada a versão da classe filha.
            $this->responder();

        } else {

            // executarMania() é private na classe Pai.
            //
            // Mesmo que a classe Filho tenha um método
            // com o mesmo nome, este código continuará
            // executando o método privado da classe Pai.
            $this->executarMania();
        }
    }
}


// ======================================================
// CLASSE FILHO
// ======================================================
//
// Filho herda os membros públicos e protegidos de Pai.
//
// Ela pode utilizar:
//
// - humor, porque é public;
// - responder(), porque é protected;
// - executarAcao(), porque é public;
//
// Mas não consegue acessar diretamente:
//
// - nome, porque é private;
// - executarMania() da classe Pai, porque é private.
//
class Filho extends Pai {

    // O construtor é executado automaticamente
    // quando um objeto Filho é criado.
    public function __construct() {

        // get_class_methods($this) retorna um array
        // com os métodos acessíveis dentro deste contexto.
        //
        // Como estamos dentro da classe Filho,
        // podem aparecer métodos públicos, protegidos
        // e os métodos privados pertencentes ao próprio Filho.
        echo '<pre>';
        print_r(get_class_methods($this));
        echo '</pre>';
    }


    // Este método privado pertence exclusivamente
    // à classe Filho.
    //
    // Ele possui o mesmo nome do método private de Pai,
    // mas não é uma sobrescrita dele.
    //
    // Métodos private pertencem somente à classe
    // onde foram declarados.
    private function executarMania() {
        echo 'Cantar';
    }


    // Método público criado apenas na classe Filho.
    public function x() {

        // Chama o método público herdado de Pai.
        $this->executarAcao();
    }


    // Sobrescreve o método protected responder()
    // que foi herdado da classe Pai.
    //
    // Quando executarAcao() chamar:
    //
    // $this->responder();
    //
    // em um objeto Filho, será executado este método.
    protected function responder() {
        echo 'Olá';
    }


    /*
    ======================================================
    EXEMPLOS ALTERNATIVOS DE ACESSO A ATRIBUTOS
    ======================================================

    public function getAtributo($attr) {
        return $this->$attr;
    }

    public function setAtributo($attr, $value) {
        $this->$attr = $value;
    }


    Também seria possível redefinir os métodos mágicos
    dentro da classe Filho.

    public function __get($attr) {
        return $this->$attr;
    }

    public function __set($attr, $value) {
        $this->$attr = $value;
    }
    */
}


/*
======================================================
EXEMPLO COM OBJETO DA CLASSE PAI
======================================================

$pai = new Pai();

$pai->executarAcao();

Ao executar:

- entre 1 e 8: imprime "Oi";
- entre 9 e 10: imprime "Assobiar".
*/


// ======================================================
// CRIAÇÃO DO OBJETO FILHO
// ======================================================
//
// Ao usar new Filho(), o construtor de Filho
// é executado automaticamente.
$filho = new Filho();


// Exibe os atributos existentes no objeto.
//
// O objeto Filho contém os atributos herdados,
// mas os atributos private aparecem identificados
// como pertencentes à classe Pai.
echo '<pre>';
print_r($filho);
echo '</pre>';


// ======================================================
// PRIMEIRA EXECUÇÃO
// ======================================================
//
// executarAcao() foi herdado da classe Pai.
//
// Como o objeto é Filho:
//
// - responder() usa a versão sobrescrita de Filho:
//   imprime "Olá";
//
// - executarMania() continua usando a versão private
//   da classe Pai:
//   imprime "Assobiar".
$filho->executarAcao();

echo '<br />';


// ======================================================
// SEGUNDA EXECUÇÃO
// ======================================================
//
// x() pertence à classe Filho.
//
// Dentro de x(), o método executarAcao()
// é chamado novamente.
$filho->x();


/*
======================================================

RESUMO DO COMPORTAMENTO

private $nome
- Pertence somente à classe Pai.
- A classe Filho não acessa diretamente.

protected $sobrenome
- Pode ser usado por Pai e Filho.

public $humor
- Pode ser acessado de qualquer lugar.


private executarMania() em Pai
- Só pode ser usado dentro de Pai.
- Não é sobrescrito pelo método de mesmo nome em Filho.

private executarMania() em Filho
- Pertence somente à classe Filho.
- É um método diferente do método private de Pai.

protected responder()
- Pode ser herdado.
- Pode ser sobrescrito pela classe Filho.

public executarAcao()
- Pode ser chamado de fora da classe.
- Funciona como uma porta pública para executar
  comportamentos internos protegidos ou privados.


ENCAPSULAMENTO

A classe controla quais partes ficam expostas
e quais partes permanecem protegidas internamente.

======================================================
*/

?>