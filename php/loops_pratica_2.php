<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curso PHP</title>
</head>

<body>

<?php

// Array principal.
// Cada posição representa um funcionário.
//
// Dentro de cada funcionário existe outro array
// contendo as informações desse funcionário.
$funcionarios = array(

    array(
        'nome' => 'João',
        'salario' => 2500,
        'cargo' => 'Analista'
    ),

    array(
        'nome' => 'Maria',
        'salario' => 3000
    ),

    array(
        'nome' => 'José',
        'salario' => 2800
    ),

    array(
        'nome' => 'Ana',
        'salario' => 3200
    ),

    array(
        'nome' => 'Carlos',
        'salario' => 2600
    )

);

// Apenas para visualizar como o array está organizado.
echo '<pre>';
print_r($funcionarios);
echo '</pre>';


// FOREACH EXTERNO
// Percorre o array principal ($funcionarios).
//
// $idx -> índice do funcionário (0,1,2,3...)
// $funcionario -> array contendo os dados de um funcionário.
foreach ($funcionarios as $idx => $funcionario) {

    // Apenas para identificar qual funcionário está sendo percorrido.
    echo "<strong>Funcionário " . ($idx + 1) . "</strong><br>";

    // FOREACH INTERNO
    // Percorre o array do funcionário atual.
    //
    // Exemplo:
    //
    // [
    //   'nome' => 'João',
    //   'salario' => 2500,
    //   'cargo' => 'Analista'
    // ]
    //
    // $idx2 recebe a chave:
    // nome
    // salario
    // cargo
    //
    // $valor recebe o conteúdo:
    // João
    // 2500
    // Analista
    foreach ($funcionario as $idx2 => $valor) {

        echo "$idx2: $valor <br>";

    }

    // Linha separando um funcionário do outro.
    echo "<hr>";

}

?>

</body>

</html>