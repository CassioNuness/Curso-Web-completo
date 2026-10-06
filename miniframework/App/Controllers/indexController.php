<?php

    namespace App\Controllers;

    class indexController
    {
        private $view;
        
        public function __construct()
        {
            $this->view = new \stdClass();
        }

        public function index()
        {
            $this->view->dados = array(
                'Sofa',
                'Cadeira',
                'Mesa',
            );
            $this->render('index');
        }

        public function sobreNos()
        {
            $this->view->dados = array(
                'cama',
                'guarda-roupa',
            );

            $this->render('sobreNos');
        }

        public function render($view) {
            $classAtual = get_class($this);

            $classAtual = str_replace('App\\Controllers\\', '', $classAtual);

            $classAtual = strtolower(str_replace('Controller', '', $classAtual));
            
            require_once __DIR__ . "/../Views/$classAtual/$view.phtml";
        }
    }

?>