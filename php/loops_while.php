<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curso PHP</title>

</head>

<body>


    <?php

        $num = 1;
        //operadores comparação / logicos 
        echo "-- Inicio do Loop -- <br/>";
        while ($num <= 10) {

            $num ++; //criterio de parada do loop

            if( $num == 2 || $num == 6) {
                continue; //pula a execução do loop
            }

            echo "$num <br/>";

            /*
            if( $num >= 100) {
                break; //interrompe a execução do loop
            }
            */
            

        }
        echo "-- Fim do Loop -- <br/>";

    ?>

</body>

</html>