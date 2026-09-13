<?php

class Conexao {

    private $host = 'localhost';
    private $porta = '5432';
    private $banco = 'php_com_pdo';
    private $usuario = 'postgres';
    private $senha = 'root';

    public function conectar() {

        try {

            $pdo = new PDO(
                "pgsql:host=$this->host;port=$this->porta;dbname=$this->banco",
                $this->usuario,
                $this->senha,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]
            );

            return $pdo;

        } catch (PDOException $e) {

            echo '<p>' . $e->getMessage() . '</p>';

        }
    }
}

?>