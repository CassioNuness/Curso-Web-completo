<?php

    namespace App\Models;

    use PDO;

    class Produto {
        
        protected $db;

        public function __construct(PDO $db) {
            $this->db = $db;
        }

        public function getAllProdutos() {
            $stmt = $this->db->prepare("SELECT * FROM tb_produtos");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>