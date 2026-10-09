<?php

    namespace App\Controllers;

    use MF\Controller\Action;

    class indexController extends Action
    {

        public function index()
        {
            $this->view->dados = array(
                'Sofa',
                'Cadeira',
                'Mesa',
            );
            $this->render('index', 'layout1');
        }

        public function sobreNos()
        {
            $this->view->dados = array(
                'cama',
                'guarda-roupa',
            );

            $this->render('sobreNos', 'layout1');
        }
    }

?>