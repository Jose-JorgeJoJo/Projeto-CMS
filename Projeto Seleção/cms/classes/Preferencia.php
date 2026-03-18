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

        $existe = self::get();

        if(!$existe){

            // INSERT
            $sql = "INSERT INTO preferencias (
                titulo_landing, favicon, logo_cabecalho,
                link_facebook, link_instagram,
                imagem_facebook, imagem_instagram,
                link_appstore, link_playstore,
                titulo_home, subtitulo_home, imagem_home,
                titulo_caracteristicas, titulo_testemunho,
                titulo_loja, subtitulo_loja, imagem_loja,
                imagem_appstore, imagem_playstore,
                telefone, logo_rodape,
                mensagem_copyright, url_rodape, mensagem_powered
            ) VALUES (
                :titulo_landing, :favicon, :logo_cabecalho,
                :link_facebook, :link_instagram,
                :imagem_facebook, :imagem_instagram,
                :link_appstore, :link_playstore,
                :titulo_home, :subtitulo_home, :imagem_home,
                :titulo_caracteristicas, :titulo_testemunho,
                :titulo_loja, :subtitulo_loja, :imagem_loja,
                :imagem_appstore, :imagem_playstore,
                :telefone, :logo_rodape,
                :mensagem_copyright, :url_rodape, :mensagem_powered
            )";

        } else {

            // UPDATE
            $sql = "UPDATE preferencias SET
                titulo_landing = :titulo_landing,
                favicon = :favicon,
                logo_cabecalho = :logo_cabecalho,
                link_facebook = :link_facebook,
                link_instagram = :link_instagram,
                imagem_facebook = :imagem_facebook,
                imagem_instagram = :imagem_instagram,
                link_appstore = :link_appstore,
                link_playstore = :link_playstore,
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

        return $stmt->execute([
            ':titulo_landing' => $dados['titulo_landing'] ?? null,
            ':favicon' => $dados['favicon'] ?? null,
            ':logo_cabecalho' => $dados['logo_cabecalho'] ?? null,
            ':link_facebook' => $dados['link_facebook'] ?? null,
            ':link_instagram' => $dados['link_instagram'] ?? null,
            ':imagem_facebook' => $dados['imagem_facebook'] ?? null,
            ':imagem_instagram' => $dados['imagem_instagram'] ?? null,
            ':link_appstore' => $dados['link_appstore'] ?? null,
            ':link_playstore' => $dados['link_playstore'] ?? null,
            ':titulo_home' => $dados['titulo_home'] ?? null,
            ':subtitulo_home' => $dados['subtitulo_home'] ?? null,
            ':imagem_home' => $dados['imagem_home'] ?? null,
            ':titulo_caracteristicas' => $dados['titulo_caracteristicas'] ?? null,
            ':titulo_testemunho' => $dados['titulo_testemunho'] ?? null,
            ':titulo_loja' => $dados['titulo_loja'] ?? null,
            ':subtitulo_loja' => $dados['subtitulo_loja'] ?? null,
            ':imagem_loja' => $dados['imagem_loja'] ?? null,
            ':imagem_appstore' => $dados['imagem_appstore'] ?? null,
            ':imagem_playstore' => $dados['imagem_playstore'] ?? null,
            ':telefone' => $dados['telefone'] ?? null,
            ':logo_rodape' => $dados['logo_rodape'] ?? null,
            ':mensagem_copyright' => $dados['mensagem_copyright'] ?? null,
            ':url_rodape' => $dados['url_rodape'] ?? null,
            ':mensagem_powered' => $dados['mensagem_powered'] ?? null,
            ':id' => $dados['id'] ?? null
        ]);
    }
}