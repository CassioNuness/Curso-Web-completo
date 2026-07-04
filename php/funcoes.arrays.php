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
        $array = 'String';
        $retorno = is_array($array);

        if ($retorno) {
            echo "Sim, é um array";
        } else {
            echo "Não, não é um array";
        }
        */

        /*
        $array = [1 => 'a', 7 => 'b', 18 => 'c'];
        echo "<pre>";
        print_r($array);
        echo "</pre>";

        $chaves = array_keys($array);
        echo "<pre>";
        print_r($chaves);
        echo "</pre>";
        */

        /*
        $array = array('mouse', 'teclado', 'monitor', 'gabinete', 'notebook');
        echo "<pre>";
        print_r($array);
        echo "</pre>";

        sort($array);//ordena o array em ordem crescente
        echo "<pre>";
        print_r($array);
        echo "</pre>";
        */

        /*
        $array = array('mouse', 'teclado', 'monitor', 'gabinete', 'notebook');
        echo "<pre>";
        print_r($array);
        echo "</pre>";

        asort($array);//ordena o array em ordem crescente, mantendo a associação dos índices
        echo "<pre>";
        print_r($array);
        echo "</pre>";
        */

        /*
        $array = array('mouse', 'teclado', 'cabo hdmi', 'monitor', 'gabinete', 'notebook');
        echo "<pre>";
        print_r($array);
        echo count($array);
        echo "</pre>";
        */

        /*
        $array1 = ['osx', 'windows'];
        $array2 = array('linux');
        $array3 = ['solaris'];

        $novo_array = array_merge($array1, $array2, $array3);//junta os arrays em um só 
        echo "<pre>";
        print_r($novo_array);
        echo "</pre>";
        */

        /*
        $string = "04/07/2026";
        $array_retorno = explode('/', $string);//explode() -> transforma uma string em um array, separando os elementos de acordo com o delimitador informado
        echo "<pre>";
        echo $string;
        print_r($array_retorno);
        echo $array_retorno[0];
        echo "/";
        echo $array_retorno[1];
        echo "/";
        echo $array_retorno[2];
        echo "</pre>";
        */

        $array = ['a', 'b', 'x', 'y'];
        $string_retorno = implode(',', $array);//implode() -> transforma um array em uma string, unindo os elementos de acordo com o delimitador informado
        echo "<pre>";
        echo $string_retorno;
        echo "</pre>";

    ?>

</body>

</html>