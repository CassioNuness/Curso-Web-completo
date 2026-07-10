<?php
session_start();
session_destroy();
header('Location: index.php'); //redireciona para a página de login

//remover indices do array de sessão
//unset() - remove indices do array de sessão

//destruir a variável de sessão
//session_destroy() - destrói a variável de sessão

?>