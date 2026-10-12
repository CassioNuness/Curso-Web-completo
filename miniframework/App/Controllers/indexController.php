<?php

    namespace App\Controllers;

    //Os recursos do framework são importados para dentro do controller
    use MF\Controller\Action;
    use MF\Model\Container;

    //Os models que serão utilizados 
    use App\Models\Produto;
    use App\Models\Info;

    
    class indexController extends Action
    {

        public function index()
        {
            $produtos = Container::getModel('Produto');

            $produtos = $produtos->getAllProdutos();

            $this->view->produtos = $produtos;

            $this->render('index', 'layout1');
        }

        public function sobreNos()
        {
            $info = Container::getModel('Info');

            $informacoes = $info->getInfo();

            $this->view->dados = $informacoes;

            $this->render('sobreNos', 'layout1');
        }
    }

?>