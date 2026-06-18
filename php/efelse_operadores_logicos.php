<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Curso PHP</title>

	</head>

	<body>
        
        <?php

        //operadores condicionais/comparação
        //==
        //===
        //!= ou <>
        //!==
        // <
        // >
        // <=
        // >=

        //operadores lógicos
        //E: && ou AND -> retorna verdadeiro se todos os resultados das expressões forem verdadeiros;
        //OU: || ou OR => retorna verdadeiro se pelo menos um dos resultados for verdadeiro;
        //XOR: XOR -> retorna se uma das expressões for verdadeiro e a outra falsa, ou vice e versa;
        //!: -> inverte o resultado retornado pela expressão;

        //() estabelecer precedência


        if((22 == 22 && 3 == 3) || 5 != 5) {
            echo 'verdadeiro';
        }else {
            echo 'falso';
        }
			
        ?>


        
	</body>	

</html>
