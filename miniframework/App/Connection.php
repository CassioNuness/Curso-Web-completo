<?php

namespace App;

use PDO;
use PDOException;

class Connection
{
    private $host = 'localhost';
    private $porta = '5432';
    private $banco = 'mvc';
    private $usuario = 'postgres';
    private $senha = 'root';

    public function getDb()
    {
        try {

            $conn = new PDO(
                "pgsql:host=$this->host;port=$this->porta;dbname=$this->banco",
                $this->usuario,
                $this->senha,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]
            );

            return $conn;

        } catch (PDOException $e) {

            echo '<p>Erro ao conectar ao banco de dados: ' . $e->getMessage() . '</p>';

        }
    }
}

?>