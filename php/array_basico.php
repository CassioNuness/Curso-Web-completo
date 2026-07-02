<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curso PHP</title>

</head>

<body>


    <?php

    /*
    //array sequenciais (numericos)
    //$lista_frutas = array("Banana", "Maçã", "Morango", "Uva", "Abacate");
    $lista_frutas = ["Banana", "Maçã", "Morango", "Uva", "Abacate"];

    $lista_frutas[] = "Laranja"; //adicionando um elemento no array

    
    echo "<pre>";
    print_r($lista_frutas);
    echo "</pre>";
    echo "<hr />";
    echo "</pre>";
    print_r($lista_frutas);
    echo "</pre>";
    
    echo "<hr />";
    echo ($lista_frutas[4]);
    */

    //array associativos
    $lista_frutas = [
        "a" => "Banana",
        "b" => "Maçã",
        "c" => "Morango",
        "d" => "Uva",
        "e" => "Abacate"
    ];

    $lista_frutas["w"] = "Abacaxi"; //adicionando um elemento no array

    echo "<pre>";
    var_dump($lista_frutas);
    echo "</pre>";//o </pre> é para formatar a saída do var_dump, para que fique mais legível

    echo $lista_frutas["w"];




    ?>



</body>

</html>