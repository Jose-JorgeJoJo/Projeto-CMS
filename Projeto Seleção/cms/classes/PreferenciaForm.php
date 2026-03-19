<?php

class PreferenciaForm {
    private $html;

    public function __construct() {
        $this->html = file_get_contents('cms/html/preferenciaform.html');
    }

  public function save($request) {
    if ($_POST) {

        $camposImagem = [
            'favicon',
            'logo_cabecalho',
            'imagem_home',
            'imagem_loja',
            'imagem_appstore',
            'imagem_playstore',
            'logo_rodape',
            'imagem_facebook',
            'imagem_instagram'
        ];

        foreach ($camposImagem as $campo) {
            $upload = $this->uploadImagem($campo);

            if ($upload) {
                $request[$campo] = $upload;
            } else {
                $request[$campo] = $_POST[$campo . '_atual'] ?? '';
            }
        }

        // 🔥 REMOVE CAMPOS *_atual (ESSENCIAL)
        foreach ($request as $key => $value) {
            if (str_ends_with($key, '_atual')) {
                unset($request[$key]);
            }
        }

        Preferencia::save($request);

        header("Location: index.php?class=PreferenciaForm&sucesso=1");
        exit;
    }
}

   function uploadImagem($campo) {
    if (!empty($_FILES[$campo]['name'])) {

        $tiposPermitidos = ['image/jpeg', 'image/png', 'image/webp'];

        if (!in_array($_FILES[$campo]['type'], $tiposPermitidos)) {
            return null;
        }

        $pasta = "uploads/";
        
        if (!is_dir($pasta)) {
            mkdir($pasta, 0777, true);
        }

        $nome = uniqid() . "-" . basename($_FILES[$campo]['name']);
        $caminho = $pasta . $nome;

        if (move_uploaded_file($_FILES[$campo]['tmp_name'], $caminho)) {
            return $caminho;
        }
    }

    return null;
}

    public function show() {
        $dados = Preferencia::get();
        $render = $this->html;
        $campos = [
            'titulo_landing', 'favicon', 'logo_cabecalho', 'link_facebook', 
            'link_instagram', 'titulo_home', 'subtitulo_home', 'imagem_home', 
            'titulo_caracteristicas', 'titulo_testemunho', 'titulo_loja', 
            'subtitulo_loja', 'imagem_loja', 'imagem_appstore', 'imagem_playstore', 
            'telefone', 'logo_rodape', 'mensagem_copyright', 'url_rodape', 'mensagem_powered',
            'imagem_facebook','imagem_instagram','link_appstore','link_playstore'
        ];

        foreach ($campos as $campo) {
            $valor = $dados[$campo] ?? '';
            $render = str_replace("{{$campo}}", $valor, $render);
        }

        $msg = isset($_GET['sucesso']) ? '<p style="color:green;">✔ Alterado com sucesso!</p>' : '';
        $render = str_replace('{mensagem}', $msg, $render);

        echo $render;
    }
}