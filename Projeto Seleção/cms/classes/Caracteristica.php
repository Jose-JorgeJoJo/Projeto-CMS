<?php

require_once "Database.php";

class Caracteristica {

    public static function all(){
        $conn = Database::getConnection();

        return $conn->query("SELECT * FROM caracteristicas ORDER BY id DESC")
                    ->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id){
        $conn = Database::getConnection();

        $sql = "SELECT * FROM caracteristicas WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id'=>$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function save($dados){

    $conn = Database::getConnection();

    if(empty($dados['id'])){

        $sql = "INSERT INTO caracteristicas (titulo, descricao)
                VALUES (:titulo, :descricao)";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ':titulo' => $dados['titulo'],
            ':descricao' => $dados['descricao']
        ]);

    } else {

        
        $sql = "UPDATE caracteristicas SET
                    titulo = :titulo,
                    descricao = :descricao
                WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ':titulo' => $dados['titulo'],
            ':descricao' => $dados['descricao'],
            ':id' => $dados['id']
        ]);
    }
}

    public static function delete($id){
        $conn = Database::getConnection();

        $sql = "DELETE FROM caracteristicas WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
    }
}