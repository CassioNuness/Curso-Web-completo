<?php
// Lógica para registrar o chamado

echo '<pre>';
print_r($_POST);
echo '</pre>';

//estamos trabalhando na montagem do texto que será gravado no arquivo
$titulo = str_replace('#', '-', $_POST['titulo']);
$categoria = str_replace('#', '-', $_POST['categoria']);
$descricao = str_replace('#', '-', $_POST['descricao']);

$texto = $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;

//abrindo o arquivo.hd para acrescentar informações
$arquivo = fopen('arquivo.hd', 'a');

//escrevendo o texto no arquivo.hd
fwrite($arquivo, $texto);

//fechando o arquivo.hd
fclose($arquivo);

// echo $texto;
header('Location: abrir_chamado.php');

?>