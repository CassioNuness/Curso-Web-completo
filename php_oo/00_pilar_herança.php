<?php

// ======================================================
// PILAR DA HERANÇA
// ======================================================
//
// O que é Herança?
//
// Herança permite que uma classe filha reutilize
// atributos e métodos de uma classe pai.
//
// Isso evita repetição de código e facilita
// a manutenção da aplicação.
//
// Estrutura:
//
//              Veiculo
//             /      \
//         Carro      Moto
//
// Carro e Moto herdam:
// ✔ placa
// ✔ cor
// ✔ acelerar()
// ✔ freiar()
//
// Além disso, cada classe pode possuir seus próprios
// atributos e métodos.
//
// Palavra-chave utilizada:
// extends
//
// ======================================================



// ======================================================
// CLASSE PAI (SUPERCLASSE)
// ======================================================
//
// A classe Veiculo representa tudo o que qualquer
// veículo possui em comum.
//
class Veiculo {

    // ============================
    // ATRIBUTOS
    // ============================

    // Todo veículo possui uma placa.
    public $placa = null;

    // Todo veículo possui uma cor.
    public $cor = null;


    // ============================
    // MÉTODOS
    // ============================

    // Todos os veículos conseguem acelerar.
    function acelerar() {
        echo 'Acelerar';
    }

    // Todos os veículos conseguem frear.
    function freiar() {
        echo 'Freiar';
    }

}



// ======================================================
// CLASSE FILHA - CARRO
// ======================================================
//
// A classe Carro herda tudo da classe Veiculo.
//
// Ou seja, automaticamente possui:
//
// placa
// cor
// acelerar()
// freiar()
//
// Além disso, ela possui características próprias.
//
class Carro extends Veiculo {

    // Atributo exclusivo do carro.
    public $teto_solar = true;


    // Construtor
    //
    // É executado automaticamente quando um objeto
    // é criado utilizando "new".
    function __construct($placa, $cor) {

        // Define a placa do carro.
        $this->placa = $placa;

        // Define a cor do carro.
        $this->cor = $cor;
    }


    // Método exclusivo do carro.
    function abrirTetoSolar() {
        echo 'Abrir teto solar';
    }


    // Método exclusivo do carro.
    function alterarPosicaoVolante() {
        echo 'Alterar a posição do volante';
    }

}



// ======================================================
// CLASSE FILHA - MOTO
// ======================================================
//
// Assim como o carro,
// a Moto também herda tudo da classe Veiculo.
//
// Porém ela possui comportamentos próprios.
//
class Moto extends Veiculo {

    // Atributo exclusivo da moto.
    public $contraPesoGuiado = true;


    // Construtor
    function __construct($placa, $cor) {

        $this->placa = $placa;
        $this->cor = $cor;

    }


    // Método exclusivo da moto.
    function empinar() {
        echo 'Empinar';
    }

}



// ======================================================
// INSTÂNCIAS (OBJETOS)
// ======================================================
//
// Agora estamos criando objetos reais
// utilizando as classes.
//
$carro = new Carro('WHL2145', 'Branco');

$moto = new Moto('ERQ3560', 'Preto');



// ======================================================
// VISUALIZANDO OS OBJETOS
// ======================================================
//
// print_r() mostra todos os atributos
// existentes no objeto.
//
// Observe que:
//
// O carro possui:
//
// placa
// cor
// teto_solar
//
// A moto possui:
//
// placa
// cor
// contraPesoGuiado
//
// placa e cor vieram da herança.
//
echo '<pre>';

print_r($carro);

echo '<br /><br />';

print_r($moto);

echo '</pre>';



echo '<hr />';



// ======================================================
// MÉTODOS DO CARRO
// ======================================================

// Método exclusivo do carro.
$carro->abrirTetoSolar();

echo '<br />';

// Método herdado da classe Veiculo.
$carro->acelerar();

echo '<br />';

// Método herdado da classe Veiculo.
$carro->freiar();



echo '<hr />';



// ======================================================
// MÉTODOS DA MOTO
// ======================================================

// Método exclusivo da moto.
$moto->empinar();

echo '<br />';

// Método herdado da classe Veiculo.
$moto->acelerar();

echo '<br />';

// Método herdado da classe Veiculo.
$moto->freiar();



/*
======================================================

RESUMO

Classe Pai:
    Veiculo

Classes Filhas:
    Carro
    Moto

Herança permite reutilizar código.

Carro herda:
✔ placa
✔ cor
✔ acelerar()
✔ freiar()

Moto herda:
✔ placa
✔ cor
✔ acelerar()
✔ freiar()

Carro possui ainda:
✔ teto_solar
✔ abrirTetoSolar()
✔ alterarPosicaoVolante()

Moto possui ainda:
✔ contraPesoGuiado
✔ empinar()

Vantagens da Herança:

✔ Reaproveitamento de código.
✔ Organização.
✔ Evita duplicação.
✔ Facilita manutenção.
✔ Facilita futuras expansões.

======================================================
*/