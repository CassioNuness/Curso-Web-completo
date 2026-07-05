<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curso PHP</title>

</head>

<body>


    <?php

        $itens = array('sofa', 'mesa', 'cadeira', 'cama', 'fogão');
        echo '<pre>';
        print_r($itens);
        echo '</pre>';
        
        // Estrutura de repetição foreach
        foreach($itens as $item) {
            echo "$item ";

            if($item == 'mesa') {
                echo '*Compre uma mesa e ganhe 25% de desconto na compra de 4 cadeiras*';
            }

            echo '<br>';
        }

    ?>

</body>

</html>