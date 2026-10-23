<?php

declare(strict_types=1);

use App\Application\Middleware\SessionMiddleware;
use App\Application\Settings\SettingsInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\App;

return function (App $app) {

    $app->add(SessionMiddleware::class);

    // Middleware de autenticação JWT
    $app->add(function (
        ServerRequestInterface $request,
        RequestHandlerInterface $handler
    ) use ($app): ResponseInterface {

        $path = $request->getUri()->getPath();

        // Remove o caminho-base do projeto
        $basePath = $app->getBasePath();

        if (str_starts_with($path, $basePath)) {
            $path = substr($path, strlen($basePath));
        }

        // Permite requisições OPTIONS (CORS)
        if ($request->getMethod() === 'OPTIONS') {
            return $handler->handle($request);
        }

        // Protege as rotas /api, exceto /api/token
        if (
            !str_starts_with($path, '/api/') ||
            $path === '/api/token'
        ) {
            return $handler->handle($request);
        }

        $authorization = $request->getHeaderLine('Authorization');

        try {
            if (!preg_match('/^Bearer\s+(.+)$/i', $authorization, $matches)) {
                throw new RuntimeException('Token não informado');
            }

            $settings = $app->getContainer()->get(SettingsInterface::class);
            $secretKey = $settings->get('secretKey');

            if (!is_string($secretKey) || strlen($secretKey) < 32) {
                throw new RuntimeException('Chave JWT não configurada');
            }

            // Valida assinatura e expiração do token
            JWT::decode($matches[1], new Key($secretKey, 'HS256'));

            return $handler->handle($request);

        } catch (Throwable $e) {

            $response = $app->getResponseFactory()->createResponse(401);

            $response->getBody()->write(json_encode([
                'erro' => 'Token ausente, inválido ou expirado'
            ]));

            return $response->withHeader(
                'Content-Type',
                'application/json'
            );
        }
    });
};