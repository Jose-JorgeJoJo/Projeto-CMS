<?php

class Database {

    private static $conn;

    public static function getConnection(){

        if(empty(self::$conn)){

            $host = "localhost";
            $db   = "projetoselecao";
            $user = "root";
            $pass = "";

            self::$conn = new PDO(
                "mysql:host=$host;dbname=$db;charset=utf8",
                $user,
                $pass
            );

            self::$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        }

        return self::$conn;

    }

}