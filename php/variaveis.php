<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Curso PHP</title>

	</head>

	<body>
        
        <?php
        
            //String
            $nome = 'Jorge Sant Ana';

			//int
			$idade = 29;

			//float
			$peso = 82.5;

			//boolean
			$fumante_sn = true; //(true = 1) ou (false = vazio)
			
        ?>

        <h1>Ficha cadastral</h1>
		<br/>
		<p>Nome: <?= $nome ?></p>
		<p>Idade: <?= $idade ?></p>
		<p>Peso: <?= $peso ?></p>
		<p>Fumante: <?= $fumante_sn ?></p>
        
	</body>	

</html>
