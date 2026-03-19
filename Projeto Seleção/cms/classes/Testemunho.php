<?php
require_once "Database.php";
class Testemunho{
    public static function get(){
        $conn = Database::getConnection();

        $sql = "SELECT * FROM testemunhos ORDER BY id";
        $stmt = $conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getById($id){
        $conn = Database::getConnection();
        $sql = "SELECT * FROM testemunhos WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function delete($id){

        $conn = Database::getConnection();

        $sql = "DELETE FROM testemunhos WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ":id"=>$id
        ]);

    }

   public static function save($dados){

    $conn = Database::getConnection();

    if(empty($dados['id'])){

        $sql = "INSERT INTO testemunhos (
            nome, funcao, titulo, descricao, foto, imagem_fundo
        ) VALUES (
            :nome, :funcao, :titulo, :descricao, :foto, :imagem_fundo
        )";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ':nome' => $dados['nome'],
            ':funcao' => $dados['funcao'],
            ':titulo' => $dados['titulo'],
            ':descricao' => $dados['descricao'],
            ':foto' => $dados['foto'],
            ':imagem_fundo' => $dados['imagem_fundo']
        ]);

    } else {

        $sql = "UPDATE testemunhos SET
            nome = :nome,
            funcao = :funcao,
            titulo = :titulo,
            descricao = :descricao,
            foto = :foto,
            imagem_fundo = :imagem_fundo
        WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ':id' => $dados['id'],
            ':nome' => $dados['nome'],
            ':funcao' => $dados['funcao'],
            ':titulo' => $dados['titulo'],
            ':descricao' => $dados['descricao'],
            ':foto' => $dados['foto'],
            ':imagem_fundo' => $dados['imagem_fundo']
        ]);
    }
}
}