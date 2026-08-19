<?php

    $busca = '2';

    // SWITCH
    // Faz comparação flexível (==)
    switch ($busca) {

        case '1':
            $retornoSwitch = "Encontrou o texto 1";
            break;

        case 2:
            $retornoSwitch = "Encontrou o número 2";
            break;

        default:
            $retornoSwitch = "Não encontrou";
    }

    echo "Resultado switch: " . $retornoSwitch;

    echo "<hr>";


    // MATCH - PHP 8
    // Faz comparação estrita (===)
    /*$retornoMatch = match ($busca) {

        '1' => "Encontrou o texto 1",

        1 => "Encontrou o número 2",

        5, '8', 12, 'X', => "Encontrou o valor 5 ou 12 ou os textos 8 ou X",

        default => "Não encontrou"
    };
    */

    // Match com condicionais e operadores lógicos
    $retornoMatch = match (true) {

        $busca < 20 => "Encontrou",

        $busca >= 20 && $busca <= 30 => "Encontrou um valor maior que 20 e menor que 30", 

        default => "Não encontrou"
    };

    echo "Resultado match: " . $retornoMatch;

?>