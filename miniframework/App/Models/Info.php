<?php

    namespace App\Models;

    use PDO;
    use MF\Model\Model;

    class Info extends Model {

        public function getInfo() {
            $stmt = $this->db->prepare("SELECT titulo, descricao FROM tb_info");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>