<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curso PHP</title>

</head>

<body>


    <?php

    function calcularImposto($salario)
    {
        if ($salario <= 1903.98) {
            return 0;
        }

        if ($salario <= 2826.65) {
            return $salario * 0.075;
        }

        if ($salario <= 3751.05) {
            return $salario * 0.15;
        }

        if ($salario <= 4664.68) {
            return $salario * 0.225;
        }

        return $salario * 0.275;
    }

    echo calcularImposto(1800);
    echo "<br>";
    echo calcularImposto(2500);
    echo "<br>";
    echo calcularImposto(5000);

    ?>



</body>

</html>