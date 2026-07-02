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
    //recuperação da data atual / data corrente
    echo date("d/m/Y H:i");

    //
    echo "<br />";
    echo date_default_timezone_get();
    echo date_default_timezone_set("America/Sao_Paulo");
    echo "<br />";
    echo date("d/m/Y H:i");
    */

    $data_inicial = "2026-07-01";
    $data_final = "2026-07-31";

    //timestamps
    //converte a data para o formato timestamp

    $time_inicial = strtotime($data_inicial);
    $time_final = strtotime($data_final);

    echo $data_inicial . " - " . $time_inicial;
    echo "<br />";
    echo $data_final . " - " . $time_final;

    $diferenca_times = $time_final - $time_inicial;
    echo "<br />";
    echo "Diferença em segundos: " . $diferenca_times;
    echo "<br />";
    echo "Diferença em dias: " . floor($diferenca_times / (60 * 60 * 24));

    ?>



</body>

</html>