<?php

declare(strict_types=1);

use App\Domain\Produto\Produto;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {

    $app->group('/api/v1', function (RouteCollectorProxy $group) {

        $group->get('/produtos/lista', function (
            Request $request,
            Response $response
        ) {

            // Busca os produtos cadastrados no PostgreSQL
            $produtos = Produto::get();

            $response->getBody()->write(
                $produtos->toJson(JSON_UNESCAPED_UNICODE)
            );

            return $response->withHeader(
                'Content-Type',
                'application/json'
            );
        });

        // Adiciona um produto
        $group->post('/produtos/adiciona', function (
            Request $request,
            Response $response
        ) {

            // Recupera os dados enviados na requisição
            $dados = $request->getParsedBody();

            // Cadastra o produto no PostgreSQL
            $produto = Produto::create($dados);

            // Retorna o produto cadastrado
            $response->getBody()->write(
                $produto->toJson(JSON_UNESCAPED_UNICODE)
            );

            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(201);
        });

        // Busca um produto pelo ID
        $group->get('/produtos/lista/{id}', function (
            Request $request,
            Response $response,
            array $args
        ) {
            $produto = Produto::find($args['id']);

            if (!$produto) {
                $response->getBody()->write(
                    json_encode(['erro' => 'Produto não encontrado'])
                );

                return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(404);
            }

            $response->getBody()->write(
                $produto->toJson(JSON_UNESCAPED_UNICODE)
            );

            return $response->withHeader(
                'Content-Type',
                'application/json'
            );
        });

        // Atualiza um produto pelo ID
        $group->put('/produtos/atualiza/{id}', function (
            Request $request,
            Response $response,
            array $args
        ) {
            // Recupera os dados enviados
            $dados = $request->getParsedBody();

            // Busca o produto pelo ID
            $produto = Produto::find($args['id']);

            // Verifica se o produto existe
            if (!$produto) {
                $response->getBody()->write(
                    json_encode(['erro' => 'Produto não encontrado'])
                );

                return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(404);
            }

            // Atualiza o produto no PostgreSQL
            $produto->update($dados);

            // Retorna o produto atualizado
            $response->getBody()->write(
                $produto->toJson(JSON_UNESCAPED_UNICODE)
            );

            return $response->withHeader(
                'Content-Type',
                'application/json'
            );
        });

        // Remove um produto pelo ID
        $group->delete('/produtos/remove/{id}', function (
            Request $request,
            Response $response,
            array $args
        ) {
            // Busca o produto pelo ID
            $produto = Produto::find($args['id']);

            // Verifica se o produto existe
            if (!$produto) {
                $response->getBody()->write(
                    json_encode(['erro' => 'Produto não encontrado'])
                );

                return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(404);
            }

            // Remove o produto do PostgreSQL
            $produto->delete();

            // Retorna o produto removido
            $response->getBody()->write(
                $produto->toJson(JSON_UNESCAPED_UNICODE)
            );

            return $response->withHeader(
                'Content-Type',
                'application/json'
            );
        });
    });
};
