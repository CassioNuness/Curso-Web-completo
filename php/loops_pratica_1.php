<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curso PHP</title>

</head>

<body>


    <?php

        $registros = array(
           array('titulo' => 'Título noticia 1', 'conteudo' => 'Conteúdo noticia 1'), 
            array('titulo' => 'Título noticia 2', 'conteudo' => 'Conteúdo noticia 2'),
            array('titulo' => 'Título noticia 3', 'conteudo' => 'Conteúdo noticia 3'),
            array('titulo' => 'Título noticia 4', 'conteudo' => 'Conteúdo noticia 4')
            );

            echo '<pre>';
            print_r($registros);
            echo '</pre>';
            echo '<hr>';
            // $idx = 0;
        
        // Estrutura de repetição while
        //count => Retorna a quantidade de elementos de um array
        /*echo 'Quantidade de registros: ' . count($registros) . '<br>';
        echo '<br/>';
        while($idx < count($registros)) {

            echo '<h3>' . $registros[$idx]['titulo'] . '</h3>';
            echo '<p>' . $registros[$idx]['conteudo'] . '</p>';
            echo '<hr>';

            $idx++;
        }
        */
        
        // Estrutura de repetição do-while
        //count => Retorna a quantidade de elementos de um array
        /*echo 'Quantidade de registros: ' . count($registros) . '<br>';
        echo '<br/>';
        $idx = 0;
        do {
            echo '<h3>' . $registros[$idx]['titulo'] . '</h3>';
            echo '<p>' . $registros[$idx]['conteudo'] . '</p>';
            echo '<hr>';
            $idx++;
        } while($idx < count($registros));
        */

        // Estrutura de repetição for
        echo 'Quantidade de registros: ' . count($registros) . '<br>';
        echo '<br/>';
        for($idx = 0; $idx < count($registros); $idx++) {
            echo '<h3>' . $registros[$idx]['titulo'] . '</h3>';
            echo '<p>' . $registros[$idx]['conteudo'] . '</p>';
            
            echo '<hr>';
        }
    ?>

</body>

</html>