<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Curso PHP</title>

	</head>

	<body>
        
        <?php

        $nome = 'Cássio';
        $cor = 'azul';
        $idade = 33;
        $atividade_preferida = 'jogos de celular';

        echo 'Olá ' . $nome . ', vi que sua cor preferida é ' . $cor . ', estou vendo também que você possui ' . $idade . ' anos e que gosta de ' . $atividade_preferida;

        //aspas duplas
        echo '<br />';

        echo "Olá $nome, vi que sua cor preferida é $cor, estou vendo também que você possui $idade anos e que gosta de $atividade_preferida";
			
        ?>
        
	</body>	

</html>
