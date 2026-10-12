<?php

    namespace App\Models;

    use PDO;

    class Info {
        
        protected $db;

        public function __construct(PDO $db) {
            $this->db = $db;
        }

        public function getInfo() {
            $stmt = $this->db->prepare("SELECT titulo, descricao FROM tb_info");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>