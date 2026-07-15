<?php

// ======================================================
// PILAR DO POLIMORFISMO
// ======================================================
//
// O que é Polimorfismo?
//
// Polimorfismo significa "muitas formas".
//
// Na Programação Orientada a Objetos, significa que
// uma classe filha pode utilizar um método herdado
// da classe pai ou sobrescrevê-lo para executar um
// comportamento diferente.
//
// Em outras palavras:
//
// O mesmo método pode possuir implementações
// diferentes dependendo do objeto que o chamou.
//
// Estrutura:
//
//               Veiculo
//                  |
//          trocarMarcha()
//         /       |        \
//    Carro     Moto     Caminhao
//      |         |           |
// usa o método  sobrescreve  usa o método
//   do pai      o método      do pai
//
// ======================================================



// ======================================================
// CLASSE PAI (SUPERCLASSE)
// ======================================================
//
// Todo veículo possui características e comportamentos
// em comum.
//
class Veiculo {

    // ============================
    // ATRIBUTOS
    // ============================

    public $placa = null;
    public $cor = null;


    // ============================
    // MÉTODOS
    // ============================

    function acelerar() {
        echo 'Acelerar';
    }

    function freiar() {
        echo 'Freiar';
    }

    // Este método poderá ser utilizado pelas
    // classes filhas ou poderá ser sobrescrito.
    function trocarMarcha() {
        echo 'Desengatar embreagem com o pé e engatar marcha com a mão';
    }

}



// ======================================================
// CLASSE FILHA - CAMINHÃO
// ======================================================
//
// O caminhão herda TODOS os métodos da classe pai.
//
// Como ele não sobrescreve trocarMarcha(),
// utilizará exatamente a implementação do Veiculo.
//
class Caminhao extends Veiculo {

}



// ======================================================
// CLASSE FILHA - CARRO
// ======================================================
//
// O carro também herda todos os métodos da classe pai.
//
// Como ele NÃO sobrescreve trocarMarcha(),
// utilizará o método da classe Veiculo.
//
class Carro extends Veiculo {

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



// ======================================================
// CLASSE FILHA - MOTO
// ======================================================
//
// A moto também herda todos os métodos.
//
// Porém, neste caso, ela sobrescreve
// o método trocarMarcha().
//
// Isso é POLIMORFISMO.
//
class Moto extends Veiculo {

    public $contraPesoGuiado = true;


    function __construct($placa, $cor) {

        $this->placa = $placa;
        $this->cor = $cor;

    }

    function empinar() {
        echo 'Empinar';
    }


    // ==================================================
    // SOBRESCRITA DO MÉTODO
    // ==================================================
    //
    // A Moto substitui a implementação da classe pai
    // por uma implementação específica para motos.
    //
    // O nome do método permanece igual.
    //
    // Apenas o comportamento muda.
    //
    function trocarMarcha() {

        echo 'Desengatar embreagem com a mão e engatar marcha com o pé';

    }

}



// ======================================================
// INSTÂNCIAS (OBJETOS)
// ======================================================

$carro = new Carro('WHL2145', 'Branco');

$moto = new Moto('ERQ3560', 'Preto');

$caminhao = new Caminhao();



// ======================================================
// TESTANDO O POLIMORFISMO
// ======================================================
//
// Observe que todos os objetos possuem
// o método trocarMarcha().
//
// Porém:
//
// Carro utiliza o método da classe pai.
//
// Moto utiliza sua própria implementação.
//
// Caminhão utiliza o método da classe pai.
//

// =========================
// CARRO
// =========================

$carro->trocarMarcha();

echo '<br />';


// =========================
// MOTO
// =========================
//
// Apesar do método possuir o mesmo nome,
// o comportamento é diferente.
//
$moto->trocarMarcha();

echo '<br />';


// =========================
// CAMINHÃO
// =========================
//
// Como não sobrescreveu o método,
// utiliza a implementação do Veiculo.
//
$caminhao->trocarMarcha();



/*
======================================================

RESUMO

Classe Pai:
    Veiculo

Método da classe pai:
    trocarMarcha()

Carro:
    ✔ Herda o método.
    ✔ Utiliza exatamente a implementação do pai.

Moto:
    ✔ Herda o método.
    ✔ Sobrescreve a implementação.
    ✔ Executa uma lógica diferente.

Caminhão:
    ✔ Herda o método.
    ✔ Utiliza exatamente a implementação do pai.


POLIMORFISMO

Mesmo método.

Mesmo nome.

Comportamentos diferentes.

Vantagens:

✔ Flexibilidade.

✔ Reaproveitamento de código.

✔ Cada classe pode adaptar o comportamento
  conforme sua necessidade.

======================================================
*/