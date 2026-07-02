<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curso PHP</title>

</head>

<body>


    <?php

    //in_array() -> true or false para saber se existe ou não o valor pesquisado
    //array_search() -> retorna a chave do valor pesquisado

    $lista_frutas = array("Banana", "Maçã", "Morango", "Uva");

    echo "<pre>";
    print_r($lista_frutas);
    echo "</pre>";

    echo '<hr>';
    /*
    //$existe = in_array("Banana", $lista_frutas);
    $existe = array_search("Banana", $lista_frutas);

    if ($existe != null) {
        echo "Sim, existe a fruta pesquisada";
    } else {
        echo "Não, não existe a fruta pesquisada";
    }  
    */  

    $lista_coisas = ['frutas' => $lista_frutas,
                     'pessoas' => ['João', 'Maria', 'Pedro', 'Ana']];

    echo "<pre>";
    print_r($lista_coisas);
    echo "</pre>";

    echo in_array("Uva", $lista_coisas["frutas"]) ;

    ?>



</body>

</html>