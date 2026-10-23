<?php

declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

return function (App $app) {

    // CORS Pre-Flight OPTIONS
    $app->options('/{routes:.*}', function (
        Request $request,
        Response $response
    ) {
        return $response;
    });

    // Carrega as rotas de produtos
    $registrarRotasProdutos = require __DIR__ . '/routes/produtos.php';
    $registrarRotasProdutos($app);

    // Carrega as rotas de autenticação
    $registrarRotasAutenticacao = require __DIR__ . '/routes/autenticacao.php';
    $registrarRotasAutenticacao($app);

};