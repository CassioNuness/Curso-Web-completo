<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action
{


	public function timeline()
	{

		$this->validaAutenticacao();

		//recuperar os tweets
		$tweet = Container::getModel('Tweet');

		$tweet->__set('id_usuario', $_SESSION['id']);

		$tweets = $tweet->getAll();

		$this->view->tweets = $tweets;

		$this->render('timeline', 'layout');
	}

	public function tweet()
	{

		$this->validaAutenticacao();

		$tweet = Container::getModel('Tweet');

		$tweet->__set('tweet', $_POST['tweet']);
		$tweet->__set('id_usuario', $_SESSION['id']);

		$tweet->salvar();

		header('Location: /timeline');
		exit;
	}

	public function validaAutenticacao()
	{

		session_start();

		//validar se o usuário está autenticado
		if (
			!isset($_SESSION['id']) ||
			$_SESSION['id'] == '' ||
			!isset($_SESSION['nome']) ||
			$_SESSION['nome'] == ''
		) {
			header('Location: /?login=erro');
			exit;
		}
	}

	public function quemSeguir()
	{
		$this->validaAutenticacao();

		$pesquisarPor = isset($_POST['pesquisarPor'])
			? $_POST['pesquisarPor']
			: '';

		$usuarios = [];

		if ($pesquisarPor != '') {

			$usuario = Container::getModel('Usuario');

			$usuario->__set('nome', $pesquisarPor);
			$usuario->__set('id', $_SESSION['id']);

			$usuarios = $usuario->getAll();
		}

		$this->view->usuarios = $usuarios;

		$this->render('quemSeguir', 'layout');
	}
}
