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
    $retornoMatch = match ($busca) {

        '1' => "Encontrou o texto 1",

        2 => "Encontrou o número 2",

        default => "Não encontrou"
    };


    echo "Resultado match: " . $retornoMatch;

?>