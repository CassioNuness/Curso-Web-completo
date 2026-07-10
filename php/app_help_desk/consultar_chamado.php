<?php

// Verifica se o usuário está autenticado.
require_once "validador_acesso.php";

// ====================================================
// Leitura do arquivo contendo os chamados.
// ====================================================

// Abre o arquivo "arquivo.hd" em modo de leitura ('r').
$arquivo = fopen('arquivo.hd', 'r');

// Array que armazenará todos os chamados.
$chamados = [];

// Verifica se o arquivo foi aberto com sucesso.
if ($arquivo) {

    // Enquanto não chegar ao final do arquivo...
    while (!feof($arquivo)) {

        // Lê uma linha do arquivo.
        $linha = fgets($arquivo);

        // Ignora linhas vazias.
        if (!empty($linha)) {

            // Cada linha possui este formato:
            //
            // Título#Categoria#Descrição
            //
            // explode() quebra a string utilizando '#'
            // como separador.
            $dados = explode('#', $linha);

            // Cria um array associativo para representar
            // um chamado e adiciona ao array principal.
            $chamados[] = [

                'titulo'     => $dados[0],
                'categoria'  => $dados[1],
                'descricao'  => $dados[2]

            ];

        }

    }

    // Fecha o arquivo para liberar recursos do sistema.
    fclose($arquivo);

}

// Apenas para testes.
// echo "<pre>";
// print_r($chamados);
// echo "</pre>";

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
            <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">

              <?php foreach ($chamados as $chamado) { ?>

              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $chamado['titulo'] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $chamado['categoria'] ?></h6>
                  <p class="card-text"><?= $chamado['descricao'] ?></p>

                </div>
              </div>

              <?php } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>