<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curso PHP</title>

</head>

<body>

    <?php

    $parametro = 2;

    switch ($parametro) {
        case 1 == $parametro:
            echo 'Entrou no case 1';
            break;

            case 2 == $parametro:
            echo 'Entrou no case 2';
            break;

            case 3 == $parametro:
            echo 'Entrou no case 3';
            break;

            default:
            echo 'Entrou no default';
            break;

    }
    
    ?>


</body>

</html>