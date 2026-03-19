<?php

class CaracteristicaForm {
    private $html;
    private $dados;

    public function __construct() {
        $this->html = file_get_contents('cms/html/caracteristicaform.html');
        $this->dados = ['id' => '', 'titulo' => '', 'descricao' => ''];
    }

    public function edit($request) {
        $id = $request['id'] ?? null;
        if ($id) {
            $this->dados = Caracteristica::find($id);
        }
    }

    public function save($param) {
        try {
            Caracteristica::save($param);
            header("Location: index.php?class=CaracteristicaList");
            exit;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($param) {
        $id = (int) $param['id'];
        Caracteristica::delete($id);
        header("Location: index.php?class=CaracteristicaList");
        exit;
    }

    public function show() {
        $render = str_replace('{id}', $this->dados['id'], $this->html);
        $render = str_replace('{titulo}', $this->dados['titulo'], $render);
        $render = str_replace('{descricao}', $this->dados['descricao'], $render);
        echo $render;
    }
}