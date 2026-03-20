<?php

class TestemunhoForm {
    private $html;
    private $dados;

    public function __construct() {
        $this->html = file_get_contents('cms/html/testemunhoform.html');
        $this->dados = [
            'id' => '', 'nome' => '', 'funcao' => '', 
            'titulo' => '', 'descricao' => '', 'foto' => '', 'imagem_fundo' => ''
        ];
    }

    public function edit($request) {
        $id = $request['id'] ?? null;
        if ($id) {
            $this->dados = Testemunho::getById($id);
        }
    }

    public function save($request) {

    if ($_POST) {

        
        $foto = $this->uploadImagem('foto');
        $fundo = $this->uploadImagem('imagem_fundo');

        
        $dados = $_POST;

        $dados['foto'] = $foto ?? $_POST['foto_atual'];
        $dados['imagem_fundo'] = $fundo ?? $_POST['imagem_fundo_atual'];

        // 🚀 salvar
        Testemunho::save($dados);

        header("Location: index.php?class=TestemunhoList&sucesso=1");
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
        $render = $this->html;
        foreach ($this->dados as $chave => $valor) {
            $render = str_replace('{' . $chave . '}', $valor, $render);
        }

        $msg = isset($_GET['sucesso']) ? '<p style="color:green;">✔ Operação realizada com sucesso!</p>' : '';
        $render = str_replace('{mensagem}', $msg, $render);

        echo $render;
    }
}