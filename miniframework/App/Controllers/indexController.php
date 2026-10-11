<?php

    namespace App\Controllers;

    use MF\Controller\Action;
    use App\Connection;
    use App\Models\Produto;

    class indexController extends Action
    {

        public function index()
        {
            // $this->view->dados = array(
            //     'Sofa',
            //     'Cadeira',
            //     'Mesa',
            // );

            //instancia de conexão com o banco de dados
            $conn = new Connection();
            $db = $conn->getDb();

            //instancia do model Produto
            $produto = new Produto($db);

            $produtos = $produto->getAllProdutos();

            $this->view->dados = $produtos;

            $this->view->produtos = $produtos;

            $this->render('index', 'layout1');
        }

        public function sobreNos()
        {
            // $this->view->dados = array(
            //     'cama',
            //     'guarda-roupa',
            // );

            $this->render('sobreNos', 'layout1');
        }
    }

?>