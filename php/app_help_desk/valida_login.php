<?php

// Variável responsável por indicar
// se o usuário conseguiu fazer login.
//
// Começa como FALSE porque,
// até provar o contrário,
// ninguém está autenticado.
$usuario_autenticado = false;


// Usuários cadastrados no sistema
$usuarios_app = array(

    array(
        'email' => 'adm@teste.com.br',
        'senha' => '123456'
    ),

    array(
        'email' => 'user@teste.com.br',
        'senha' => 'abcd'
    )

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

    }

}


// Depois que terminou de percorrer
// todos os usuários,
// verifica se encontrou alguém.
if($usuario_autenticado) {

    echo 'Usuário autenticado';

} else {

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