<?php

class Database {

    private static $conn;

    public static function getConnection(){

        if(empty(self::$conn)){
            
            $config = parse_ini_file(__DIR__ . '/../config/config.ini');

        if (!$config) {
            header('Content-Type: application/json');
            echo json_encode(["error" => "Arquivo de configuracao nao encontrado"]);
            exit;
        }

        $host = $config['host'];
        $db   = $config['name'];
        $user = $config['user'];
        $pass = $config['pass'];

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