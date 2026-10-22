<?php

declare(strict_types=1);

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

require __DIR__ . '/vendor/autoload.php';

// Carrega a senha do arquivo .env
$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->safeLoad();

// Configura a conexão PostgreSQL
$capsule = new Capsule();

$capsule->addConnection([
    'driver'   => 'pgsql',
    'host'     => 'localhost',
    'port'     => 5432,
    'database' => 'slim',
    'username' => 'postgres',
    'password' => getenv('DB_PASSWORD') ?: '',
    'charset'  => 'utf8',
    'prefix'   => '',
    'schema'   => 'public',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$schema = $capsule->schema();

$tabela = 'produtos';

// Apaga a tabela anterior, caso exista
$schema->dropIfExists($tabela);

// Cria a tabela produtos
$schema->create($tabela, function (Blueprint $table) {
    $table->increments('id');
    $table->string('titulo', 100);
    $table->string('descricao');
    $table->decimal('preco', 11, 2);
    $table->string('fabricante', 60);
    $table->timestamps();
});

// Preenche a tabela produtos
$db = $capsule->getConnection();

$db->table($tabela)->insert([
    'titulo' => 'Smartphone Motorola Moto G6 32GB Dual Chip',
    'descricao' => 'Android Oreo - 8.0 Tela 5.7 Octa-Core 1.8 GHz 4G Camera 12 + 5MP',
    'preco' => 899.00,
    'fabricante' => 'Motorola',
    'created_at' => '2019-10-22',
    'updated_at' => '2019-10-22'
]);

$db->table($tabela)->insert([
    'titulo' => 'iPhone X Cinza Espacial 64GB',
    'descricao' => 'Tela 5.8 IOS 12 4G Wi-Fi Camera 12MP - Apple',
    'preco' => 4999.00,
    'fabricante' => 'Apple',
    'created_at' => '2020-10-01',
    'updated_at' => '2020-10-01'
]);

echo 'Tabela produtos criada e preenchida com sucesso!';
