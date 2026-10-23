<?php

declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use App\Domain\Usuario\Usuario;
use App\Application\Settings\SettingsInterface;
use Firebase\JWT\JWT;

return function (App $app) {

    $app->post('/api/token', function (
        Request $request,
        Response $response
    ) use ($app) {

        // 1. Receber os dados enviados pelo cliente
        $dados = $request->getParsedBody();
        $dados = is_array($dados) ? $dados : [];

        $email = $dados['email'] ?? null;
        $senha = $dados['senha'] ?? null;

        // 2. Verificar se os campos foram preenchidos
        if (!is_string($email) || $email === '' ||
            !is_string($senha) || $senha === '') {

            $response->getBody()->write(
                json_encode(['erro' => 'Email e senha são obrigatórios'])
            );

            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(400);
        }

        // 3. Buscar o usuário no PostgreSQL
        $usuario = Usuario::where('email', $email)->first();

        // 4. Verificar a senha utilizando bcrypt
        if ($usuario === null || !password_verify($senha, $usuario->senha)) {

            $response->getBody()->write(
                json_encode(['erro' => 'Email ou senha inválidos'])
            );

            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(401);
        }

        // 5. Recuperar a chave secreta das configurações
        $settings = $app->getContainer()->get(SettingsInterface::class);
        $secretKey = $settings->get('secretKey');

        if (!is_string($secretKey) || strlen($secretKey) < 32) {
            throw new RuntimeException('Chave JWT não configurada corretamente');
        }

        // 6. Preparar os dados do token
        $agora = time();

        $payload = [
            'sub' => (string) $usuario->id,
            'iat' => $agora,
            'exp' => $agora + 3600
        ];

        // 7. Gerar o token JWT
        $token = JWT::encode($payload, $secretKey, 'HS256');

        // 8. Retornar o token em JSON
        $response->getBody()->write(
            json_encode([
                'token' => $token,
                'token_type' => 'Bearer',
                'expires_in' => 3600
            ])
        );

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    });
};