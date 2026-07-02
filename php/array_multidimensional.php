<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curso PHP</title>

</head>

<body>


    <?php

    //array multidimensional
    $lista_coisas = [];

    $lista_coisas["frutas"] = array(1 => "Banana", 2 => "Maçã", 3 => "Morango", 4 => "Uva");
    $lista_coisas["pessoas"] = array(1 => "João", 2 => "Maria", 3 => "Pedro", 4 => "Ana");
    echo "<pre>";
    print_r($lista_coisas);
    echo "</pre>";

    echo '<hr>';
    echo $lista_coisas["frutas"][3];
    echo '<hr>';
    echo $lista_coisas["pessoas"][2];

    ?>



</body>

</html>