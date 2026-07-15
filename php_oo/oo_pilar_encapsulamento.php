<?php

// Classe que representa um Pai
class Pai {

    // Atributo privado:
    // só pode ser acessado dentro desta própria classe.
    private $nome = 'Jorge';

    // Atributo protegido:
    // pode ser acessado pela classe Pai
    // e também pelas classes que herdarem dela.
    protected $sobrenome = 'Silva';

    // Atributo público:
    // pode ser acessado de qualquer lugar.
    public $humor = 'Feliz';


    // Método mágico responsável por retornar
    // o valor de um atributo privado ou protegido.
    public function __get($attr) {
        return $this->$attr;
    }


    // Método mágico responsável por alterar
    // o valor de um atributo privado ou protegido.
    public function __set($attr, $value) {
        $this->$attr = $value;
    }


    // Método privado.
    // Só pode ser chamado dentro da própria classe.
    private function executarMania() {
        echo 'Assobiar';
    }


    // Método protegido.
    // Pode ser utilizado pela classe Pai
    // e pelas classes filhas.
    protected function responder() {
        echo 'Oi';
    }


    // Método público.
    // É o único método que pode ser chamado
    // diretamente fora da classe.
    public function executarAcao() {

        // Gera um número aleatório entre 1 e 10.
        $x = rand(1, 10);

        // Em aproximadamente 80% das vezes,
        // o pai responderá "Oi".
        if ($x >= 1 && $x <= 8) {

            // Como responder() é protegido,
            // ele pode ser chamado aqui normalmente.
            $this->responder();

        } else {

            // Caso contrário,
            // executa o método privado.
            $this->executarMania();

        }

    }

}


// Cria um objeto da classe Pai.
$pai = new Pai();


// Executa uma ação.
// O próprio método decidirá,
// de forma aleatória,
// se responde "Oi"
// ou se assobia.
$pai->executarAcao();

?>