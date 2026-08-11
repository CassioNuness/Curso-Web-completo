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
    class Cliente implements CadastroInterface
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