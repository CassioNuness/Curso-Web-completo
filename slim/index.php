
<?php

require __DIR__ . '/vendor/autoload.php';

use Slim\Factory\AppFactory;
use Slim\Routing\RouteContext;

$app = AppFactory::create();

$app->setBasePath('/curso_web_completo/slim');

/* Listagem de postagens */
$app->get('/postagens2', function ($request, $response) {
    $response->getBody()->write('Listagem de postagens');
    return $response;
});

/* Parâmetro opcional */
$app->get('/usuarios[/{id}]', function ($request, $response, $args) {
    $id = $args['id'] ?? null;

    // Verificar se ID é válido e existe no BD
    $response->getBody()->write('Listagem de usuarios ou ID: ' . ($id ?? 'Não informado'));

    return $response;
});

/* Parâmetros opcionais aninhados */
$app->get('/postagens[/{ano}[/{mes}]]', function ($request, $response, $args) {
    $ano = $args['ano'] ?? 'Não informado';
    $mes = $args['mes'] ?? 'Não informado';

    $response->getBody()->write("Listagem de postagens Ano: $ano mes: $mes");

    return $response;
});

/* Capturar vários itens na URL */
$app->get('/lista/{itens:.*}', function ($request, $response, $args) {
    $itens = $args['itens'];

    $lista = explode('/', $itens);

    $response->getBody()->write(
        '<pre>' . htmlspecialchars(print_r($lista, true), ENT_QUOTES, 'UTF-8') . '</pre>'
    );

    return $response;
});

/* Nomear rotas */
$app->get('/blog/postagens/{id}', function ($request, $response, $args) {
    $response->getBody()->write('Listar postagem para um ID: ' . $args['id']);
    return $response;
})->setName('blog');

/* Gerar URL de uma rota nomeada */
$app->get('/meusite', function ($request, $response) {
    $routeParser = RouteContext::fromRequest($request)->getRouteParser();

    $retorno = $routeParser->urlFor('blog', ['id' => '10']);

    $response->getBody()->write($retorno);
    return $response;
});

/* Agrupar rotas */
$app->group('/v5', function ($group) {

    $group->get('/usuarios', function ($request, $response) {
        $response->getBody()->write('Listagem de usuarios');
        return $response;
    });

    $group->get('/postagens', function ($request, $response) {
        $response->getBody()->write('Listagem de postagens');
        return $response;
    });

});

$app->run();
