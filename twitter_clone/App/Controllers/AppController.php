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

		$usuario = Container::getModel('Usuario');
		$usuario->__set('id', $_SESSION['id']);

		$this->view->infoUsuario = $usuario->getInfoUsuario();
		$this->view->totalTweets = $usuario->getTotalTweets();
		$this->view->total_Seguindo = $usuario->getTotalSeguindo();
		$this->view->total_Seguidores = $usuario->getTotalSeguidores();

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

		// Recuperar informações do perfil
		$usuario = Container::getModel('Usuario');
		$usuario->__set('id', $_SESSION['id']);

		$this->view->infoUsuario = $usuario->getInfoUsuario();
		$this->view->totalTweets = $usuario->getTotalTweets();
		$this->view->total_Seguindo = $usuario->getTotalSeguindo();
		$this->view->total_Seguidores = $usuario->getTotalSeguidores();

		$this->render('quemSeguir', 'layout');
	}

	public function acao()
	{
		$this->validaAutenticacao();

		$acao = isset($_GET['acao']) ? $_GET['acao'] : '';
		$id_usuario_seguindo = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : '';

		$usuario = Container::getModel('Usuario');
		$usuario->__set('id', $_SESSION['id']);

		if ($acao == 'seguir') {
			$usuario->seguirUsuario($id_usuario_seguindo);
		} else if ($acao == 'deixar_de_seguir') {
			$usuario->deixarSeguirUsuario($id_usuario_seguindo);
		}

		header('Location: /quem_seguir');
		exit;
	}
}
