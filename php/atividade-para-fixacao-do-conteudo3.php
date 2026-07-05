<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curso PHP</title>

</head>

<body>


    <?php

    // Cria um array vazio que armazenará os 6 números sorteados.
    $loteria = array();

    // Enquanto o array possuir menos de 6 números,
    // o laço continuará executando.
    while (count($loteria) < 6) {

        // Gera um número aleatório entre 1 e 60.
        $numero = rand(1, 60);

        // Verifica se o número NÃO existe no array.
        //
        // in_array() -> verifica se um valor existe dentro de um array.
        // ! (negação) -> significa "não".
        //
        // Exemplo:
        // Se o número for 25 e ele ainda não estiver no array,
        // a condição será verdadeira.
        if (!in_array($numero, $loteria)) {

            // Adiciona o número na próxima posição livre do array.
            //
            // O [] faz o PHP inserir automaticamente
            // no próximo índice disponível.
            $loteria[] = $numero;
        }

        // Caso o número já exista no array,
        // nada acontece.
        //
        // O while volta ao início,
        // gera outro número aleatório
        // e faz a verificação novamente.
    }

    // Exibe o array formatado para facilitar a visualização.
    echo "<pre>";
    print_r($loteria);
    echo "</pre>";

    ?>
</body>

</html>