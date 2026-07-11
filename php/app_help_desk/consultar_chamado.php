<?php

require_once "validador_acesso.php";

// Array que armazenará todos os chamados válidos
$chamados = [];

// Abre o arquivo em modo de leitura
$arquivo = fopen('arquivo.hd', 'r');

if ($arquivo) {

  // Lê cada linha enquanto ainda existir conteúdo no arquivo
  while (($linha = fgets($arquivo)) !== false) {

    // Remove espaços e quebras de linha do início e do final
    $linha = trim($linha);

    // Ignora linhas vazias
    if ($linha === '') {
      continue;
    }

    // Separa os dados pelo caractere #
    $dados = explode('#', $linha);

    // Só adiciona registros que possuem os quatro campos:
    // 0 = ID
    // 1 = título
    // 2 = categoria
    // 3 = descrição
    if (count($dados) >= 4) {
      $chamados[] = $dados;
    }
  }

  // Fecha o arquivo após terminar a leitura
  fclose($arquivo);
}

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
            Consulta de chamados
          </div>

          <div class="card-body">

            <?php foreach ($chamados as $chamado) { ?>

              <?php

              // Se o usuário for comum, perfil 2,
              // ele só poderá visualizar os próprios chamados.
              if ($_SESSION['perfil_id'] == 2) {

                // Compara o ID do usuário logado
                // com o ID do usuário que abriu o chamado.
                if ($_SESSION['usuario_id'] != $chamado[0]) {

                  // Se o chamado não pertencer ao usuário,
                  // ignora este registro e passa para o próximo.
                  continue;
                }
              }

              ?>

              <div class="card mb-3 bg-light">
                <div class="card-body">

                  <!-- Índice 1: título do chamado -->
                  <h5 class="card-title">
                    <?= htmlspecialchars($chamado[1]) ?>
                  </h5>

                  <!-- Índice 2: categoria do chamado -->
                  <h6 class="card-subtitle mb-2 text-muted">
                    <?= htmlspecialchars($chamado[2]) ?>
                  </h6>

                  <!-- Índice 3: descrição do chamado -->
                  <p class="card-text">
                    <?= htmlspecialchars($chamado[3]) ?>
                  </p>

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