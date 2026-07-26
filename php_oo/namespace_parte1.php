<?php

    // ======================================================
    // NAMESPACE A
    // ======================================================

    namespace A;

    // Interface pertencente ao namespace A
    interface CadastroInterface
    {
        public function salvar();
    }

    // Classe Cliente pertencente ao namespace A
    class Cliente implements \B\CadastroInterface
    {
        public $nome = 'Jorge';

        public function __construct(){
            echo '<pre>';
            print_r(get_class_methods($this));
            echo '</pre>';
        }

        public function __get($attr)
        {
            return $this->$attr;
        }

        // Implementação obrigatória da interface
        public function salvar()
        {
            echo 'Salvar';
        }

        // Implementação obrigatória da interface
        public function remover()
        {
            echo 'Remover';
        }

    }


    // ======================================================
    // NAMESPACE B
    // ======================================================

    namespace B;

    // Interface pertencente ao namespace B
    interface CadastroInterface
    {
        public function remover();
    }

    // Classe Cliente pertencente ao namespace B
    class Cliente implements \A\CadastroInterface
    {
        public $nome = 'Cássio';

        public function __construct(){
            echo '<pre>';
            print_r(get_class_methods($this));
            echo '</pre>';
        }

        public function __get($attr)
        {
            return $this->$attr;
        }

        // Implementação obrigatória da interface
        public function remover()
        {
            echo 'Remover';
        }

                // Implementação obrigatória da interface
        public function salvar()
        {
            echo 'Salvar';
        }

    }


    // ======================================================
    // INSTANCIANDO A CLASSE DO NAMESPACE A
    // ======================================================

    // A barra inicial indica que queremos partir
    // do namespace global e acessar A\Cliente.
    $c = new \A\Cliente();

    echo '<pre>';
    print_r($c);
    echo '</pre>';

    echo $c->__get('nome');

?>