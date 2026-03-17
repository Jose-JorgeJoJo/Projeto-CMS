<?php

require_once "Database.php";

class Usuario {

    public static function login($login,$senha){

        $conn = Database::getConnection();

        $sql = "SELECT * FROM usuarios WHERE login = :login";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ":login"=>$login
        ]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if($usuario && $senha == $usuario['senha']){

            return $usuario;

        }

        return false;

    }
      public static function all(){

        $conn = Database::getConnection();

        $sql = "SELECT * FROM usuarios ORDER BY id";

        return $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function save($usuario){

        $conn = Database::getConnection();

        $sql = "INSERT INTO usuarios (login,senha)
                VALUES (:login,:senha)";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ":login"=>$usuario['login'],
            ":senha"=>$usuario['senha']
        ]);

    }

    public static function delete($id){

        if($id == 1){
            return false;
        }

        $conn = Database::getConnection();

        $sql = "DELETE FROM usuarios WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ":id"=>$id
        ]);

    }

}