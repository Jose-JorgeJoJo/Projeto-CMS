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

            
           $sql = "INSERT INTO preferencias (
            titulo_landing, favicon, logo_cabecalho,
            link_facebook, link_instagram,
            titulo_home, subtitulo_home, imagem_home,
            titulo_caracteristicas, titulo_testemunho,
            titulo_loja, subtitulo_loja, imagem_loja,
            imagem_appstore, imagem_playstore,
            telefone, logo_rodape,
            mensagem_copyright, url_rodape, mensagem_powered,
            link_appstore, link_playstore
        ) VALUES (
            :titulo_landing, :favicon, :logo_cabecalho,
            :link_facebook, :link_instagram,
            :titulo_home, :subtitulo_home, :imagem_home,
            :titulo_caracteristicas, :titulo_testemunho,
            :titulo_loja, :subtitulo_loja, :imagem_loja,
            :imagem_appstore, :imagem_playstore,
            :telefone, :logo_rodape,
            :mensagem_copyright, :url_rodape, :mensagem_powered,
            :link_appstore, :link_playstore
        )";
        } else {

            
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
            mensagem_powered = :mensagem_powered,
            link_appstore = :link_appstore,
            link_playstore = :link_playstore
        WHERE id = :id";

            $dados['id'] = $existe['id'];
        }
        
        $camposBanco = [
            'titulo_landing', 'favicon', 'logo_cabecalho',
            'link_facebook', 'link_instagram',
            'titulo_home', 'subtitulo_home', 'imagem_home',
            'titulo_caracteristicas', 'titulo_testemunho',
            'titulo_loja', 'subtitulo_loja', 'imagem_loja',
            'imagem_appstore', 'imagem_playstore',
            'telefone', 'logo_rodape',
            'mensagem_copyright', 'url_rodape', 'mensagem_powered',
            'link_appstore', 'link_playstore',
            'id'
        ];

        $dadosFinal = [];

        foreach ($camposBanco as $campo) {
            if (isset($dados[$campo])) {
                $dadosFinal[$campo] = $dados[$campo];
            } else {
                $dadosFinal[$campo] = null; 
            }
        }

        $stmt = $conn->prepare($sql);
        $stmt->execute($dadosFinal);
    }
}