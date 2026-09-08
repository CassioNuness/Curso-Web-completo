<?php

    // Configurações do banco PostgreSQL
    $host = 'localhost';
    $porta = '5432';
    $banco = 'php_com_pdo';
    $usuario = 'postgres';
    $senha = 'root';

    try {

        // Conexão com PostgreSQL utilizando PDO
        $pdo = new PDO(
            "pgsql:host=$host;port=$porta;dbname=$banco",
            $usuario,
            $senha,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );

        echo "Conectado ao banco de dados com sucesso!";

    } catch (PDOException $e) {

        echo "Falha ao conectar ao banco de dados.<br>";
        die($e->getMessage());

    }

?>