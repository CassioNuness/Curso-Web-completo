<?php

    namespace App\Models;

    use PDO;
    use MF\Model\Model;

    class Produto extends Model {
        
        public function getAllProdutos() {
            $stmt = $this->db->prepare("SELECT * FROM tb_produtos");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>