<?php

// ======================================================
// MÉTODOS MÁGICOS EM PHP
// ======================================================
//
// O que são métodos mágicos?
//
// São métodos especiais da linguagem PHP.
//
// Eles possuem nomes reservados, iniciados por "__"
// (dois underlines), e são executados automaticamente
// em determinadas situações.
//
// Neste exemplo utilizamos:
//
// __construct() -> Executado quando o objeto é criado.
//
// __destruct() -> Executado quando o objeto é destruído.
//
// __get() -> Executado quando desejamos recuperar
//            o valor de um atributo.
//
// ======================================================



// ======================================================
// CLASSE PESSOA
// ======================================================
//
// Esta classe representa uma pessoa.
//
// Neste exemplo ela possui apenas um atributo,
// mas poderia possuir vários outros.
//
class Pessoa {

    // ============================
    // ATRIBUTOS
    // ============================

    // Nome da pessoa.
    public $nome = null;



    // ==================================================
    // CONSTRUTOR
    // ==================================================
    //
    // O método __construct() é chamado automaticamente
    // sempre que um objeto é criado utilizando "new".
    //
    // Exemplo:
    //
    // $pessoa = new Pessoa('Jorge');
    //
    // O parâmetro recebido é utilizado para preencher
    // o atributo nome.
    //
    function __construct($nome) {

        echo 'Objeto iniciado';

        // Armazena o nome recebido
        // dentro do atributo do objeto.
        $this->nome = $nome;
    }



    // ==================================================
    // DESTRUTOR
    // ==================================================
    //
    // O método __destruct() é executado automaticamente
    // quando o objeto deixa de existir.
    //
    // Isso acontece, por exemplo,
    // quando utilizamos unset().
    //
    function __destruct() {

        echo 'Objeto removido com sucesso!';

    }



    // ==================================================
    // MÉTODO MÁGICO __get()
    // ==================================================
    //
    // Responsável por retornar o valor
    // de um atributo do objeto.
    //
    // Exemplo:
    //
    // $pessoa->__get('nome');
    //
    function __get($atributo) {

        return $this->$atributo;

    }



    // ==================================================
    // MÉTODO DA CLASSE
    // ==================================================
    //
    // Utiliza o atributo nome para montar
    // uma frase personalizada.
    //
    function correr() {

        return $this->__get('nome') . ' está correndo';

    }

}



// ======================================================
// CRIAÇÃO DO OBJETO
// ======================================================
//
// Neste momento o construtor (__construct)
// será executado automaticamente.
//
$pessoa = new Pessoa('Jorge');



// ======================================================
// EXIBINDO O NOME
// ======================================================
//
// Recupera o atributo nome utilizando
// o método mágico __get().
//
echo '<br /> Nome: ' . $pessoa->__get('nome');



// ======================================================
// CHAMANDO UM MÉTODO
// ======================================================
//
// O método correr() utiliza o nome
// armazenado dentro do objeto.
//
echo '<br />' . $pessoa->correr();



echo '<br />';



// ======================================================
// REMOVENDO O OBJETO
// ======================================================
//
// unset() remove o objeto da memória.
//
// Nesse momento o PHP executa automaticamente
// o método __destruct().
//
unset($pessoa);



/*
======================================================

RESUMO

Classe:
    Pessoa

Atributo:
    nome

Métodos Mágicos:

__construct()

✔ Executado automaticamente quando
  o objeto é criado.

✔ Utilizado para inicializar atributos.


__destruct()

✔ Executado automaticamente quando
  o objeto é destruído.

✔ Pode ser utilizado para liberar recursos,
  fechar conexões com banco de dados,
  gravar logs, etc.


__get()

✔ Recupera o valor de um atributo.


Fluxo deste código:

1. new Pessoa('Jorge')
        ↓
2. __construct()
        ↓
3. nome recebe "Jorge"
        ↓
4. Exibe o nome
        ↓
5. Executa correr()
        ↓
6. unset($pessoa)
        ↓
7. __destruct()

======================================================
*/