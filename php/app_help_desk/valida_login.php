<?php

session_start();


// Variável responsável por indicar
// se o usuário conseguiu fazer login.
//
// Começa como FALSE porque,
// até provar o contrário,
// ninguém está autenticado.
$usuario_autenticado = false;
$usuario_id = null;
$usuario_perfil_id = null;

$perfis = array(
    1=> 'Administrativo',
    2 => 'Usuário'
);

// Usuários cadastrados no sistema
$usuarios_app = array(

    array(
        'id' => 1,
        'email' => 'adm@teste.com.br',
        'senha' => '1234',
        'perfil_id' => 1
    ),

    array(
        'id' => 2,
        'email' => 'user@teste.com.br',
        'senha' => '1234',
        'perfil_id' => 1
    ),

        array(
        'id' => 3,
        'email' => 'jose@teste.com.br',
        'senha' => '1234',
        'perfil_id' => 2
    ),

        array(
        'id' => 4,
        'email' => 'maria@teste.com.br',
        'senha' => '1234',
        'perfil_id' => 2
    ),

);


// Percorre todos os usuários cadastrados
foreach($usuarios_app as $user) {

    // Verifica se o e-mail e a senha
    // enviados pelo formulário são iguais
    // aos do usuário atual.
    if(
        $user['email'] == $_POST['email'] &&
        $user['senha'] == $_POST['senha']
    ) {

        // Encontrou um usuário válido.
        $usuario_autenticado = true;
        // Armazena o ID do usuário autenticado
        $usuario_id = $user['id'];
        $usuario_perfil_id = $user['perfil_id'];

    }

}


// Depois que terminou de percorrer
// todos os usuários,
// verifica se encontrou alguém.
if ($usuario_autenticado) {

    echo 'Usuário autenticado';
    $_SESSION['autenticado'] = 'SIM';
    $_SESSION['usuario_id'] = $usuario_id;
    $_SESSION['perfil_id'] = $usuario_perfil_id;
    header('Location: home.php');

} else {

    $_SESSION['autenticado'] = 'NAO';
    header('Location: index.php?login=erro');

}

// echo '<pre>';
// print_r($usuarios_app);
// echo '</pre>';

// print_r($_POST);

// echo '<br>';

// echo $_POST['email'];
// echo '<br>';
// echo $_POST['senha'];

?>