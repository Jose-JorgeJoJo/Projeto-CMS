<?php

require_once "Database.php";

class Mensagem {

    public static function all(){
        $conn = Database::getConnection();

        $sql = "SELECT * FROM mensagens ORDER BY data DESC";
        $stmt = $conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}