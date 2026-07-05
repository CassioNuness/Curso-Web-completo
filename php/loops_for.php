<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curso PHP</title>

</head>

<body>


    <?php

    // Número que será utilizado na tabuada
    $numero = 5;

    // Estrutura de repetição FOR
    // Sintaxe:
    // for (inicialização; condição; incremento)

    for ($i = 1; $i <= 10; $i++) {

        // Exibe o cálculo da tabuada
        // O ponto (.) concatena textos
        // ($numero * $i) realiza a multiplicação
        echo "$numero x $i = " . ($numero * $i) . "<br>";
    }

    echo '<hr>';

    //loop de decremento
    for ($i = 10; $i >= 1; $i--) {
        echo "$i <br>";
    }
     /*
        //loop infinito
        for ($i = 1; $i >= 2; $i++) {
            echo "$i <br>";
        }
        */

    ?>

</body>

</html>