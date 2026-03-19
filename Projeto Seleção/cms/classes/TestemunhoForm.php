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
            Testemunho::save($_POST);
            header("Location: index.php?class=TestemunhoList&sucesso=1");
            exit;
        }
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