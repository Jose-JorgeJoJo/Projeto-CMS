<?php

require_once "Database.php";

class Preferencia {

    public static function get(){
        $conn = Database::getConnection();

        $sql = "SELECT * FROM preferencias LIMIT 1";
        $stmt = $conn->query($sql);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function save($dados){

        $conn = Database::getConnection();

        // verifica se já existe registro
        $existe = self::get();

        if(!$existe){

            // INSERT (primeira vez)
            $sql = "INSERT INTO preferencias (
                titulo_landing, favicon, logo_cabecalho,
                link_facebook, link_instagram,
                titulo_home, subtitulo_home, imagem_home,
                titulo_caracteristicas, titulo_testemunho,
                titulo_loja, subtitulo_loja, imagem_loja,
                imagem_appstore, imagem_playstore,
                telefone, logo_rodape,
                mensagem_copyright, url_rodape, mensagem_powered
            ) VALUES (
                :titulo_landing, :favicon, :logo_cabecalho,
                :link_facebook, :link_instagram,
                :titulo_home, :subtitulo_home, :imagem_home,
                :titulo_caracteristicas, :titulo_testemunho,
                :titulo_loja, :subtitulo_loja, :imagem_loja,
                :imagem_appstore, :imagem_playstore,
                :telefone, :logo_rodape,
                :mensagem_copyright, :url_rodape, :mensagem_powered
            )";

        } else {

            // UPDATE (sempre atualiza o único registro)
            $sql = "UPDATE preferencias SET
                titulo_landing = :titulo_landing,
                favicon = :favicon,
                logo_cabecalho = :logo_cabecalho,
                link_facebook = :link_facebook,
                link_instagram = :link_instagram,
                titulo_home = :titulo_home,
                subtitulo_home = :subtitulo_home,
                imagem_home = :imagem_home,
                titulo_caracteristicas = :titulo_caracteristicas,
                titulo_testemunho = :titulo_testemunho,
                titulo_loja = :titulo_loja,
                subtitulo_loja = :subtitulo_loja,
                imagem_loja = :imagem_loja,
                imagem_appstore = :imagem_appstore,
                imagem_playstore = :imagem_playstore,
                telefone = :telefone,
                logo_rodape = :logo_rodape,
                mensagem_copyright = :mensagem_copyright,
                url_rodape = :url_rodape,
                mensagem_powered = :mensagem_powered
            WHERE id = :id";

            $dados['id'] = $existe['id'];
        }

        $stmt = $conn->prepare($sql);
        $stmt->execute($dados);
    }
}