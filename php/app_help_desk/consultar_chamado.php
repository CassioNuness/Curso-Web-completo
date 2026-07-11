<?php

require_once "validador_acesso.php";

// Array que armazenará somente os chamados permitidos
$chamados = [];

// Abre o arquivo em modo de leitura
$arquivo = fopen('arquivo.hd', 'r');

if ($arquivo) {

    // Lê o arquivo linha por linha
    while (($linha = fgets($arquivo)) !== false) {

        // Remove espaços e quebras de linha
        $linha = trim($linha);

        // Ignora linhas vazias
        if ($linha === '') {
            continue;
        }

        // Divide a linha:
        // 0 = ID do usuário
        // 1 = título
        // 2 = categoria
        // 3 = descrição
        $dados = explode('#', $linha);

        // Ignora registros incompletos
        if (count($dados) < 4) {
            continue;
        }

        // Se for usuário comum, permite apenas chamados próprios
        if (
            $_SESSION['perfil_id'] == 2 &&
            $_SESSION['usuario_id'] != $dados[0]
        ) {
            continue;
        }

        // Administrador chega aqui com todos os chamados.
        // Usuário comum chega apenas com os próprios chamados.
        $chamados[] = $dados;
    }

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