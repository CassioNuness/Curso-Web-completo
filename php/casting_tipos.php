<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curso PHP</title>

</head>

<body>

    <?php

    //gettype() => retorna o tipo da variável
    $valor = 15.35;
    //$valor2 = (float) $valor;
    //$valor2 = (string) $valor;
    //$valor2 = (int) $valor;
    $valor2 = (bool) $valor;

    echo $valor. ' ' .gettype($valor);
    echo '<br />';
    echo $valor2. ' ' .gettype($valor2);

    ?>



</body>

</html>