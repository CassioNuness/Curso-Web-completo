<?php

    $host = 'localhost';
    $porta = '5432';
    $banco = 'php_com_pdo';
    $usuario = 'postgres';
    $senha = 'root';

    try {

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

        echo "Erro: " . $e->getCode() . "<br>";
        echo "Mensagem: " . $e->getMessage();

    }

?>