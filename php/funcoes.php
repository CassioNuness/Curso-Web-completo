<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curso PHP</title>

</head>

<body>


    <?php

        //void (sem retorno)
        function exibirBoasVindas() {
            echo 'Bem-vindo ao curso de PHP!<br />';
        }

        exibirBoasVindas();

        //return (com retorno)
        function calcularAreaTerreno($largura, $comprimento) {
            $area = $largura * $comprimento;
            return $area;
        }

        echo calcularAreaTerreno(30, 50);

    ?>



</body>

</html>