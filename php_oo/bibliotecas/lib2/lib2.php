<?php

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
    class Cliente implements CadastroInterface
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