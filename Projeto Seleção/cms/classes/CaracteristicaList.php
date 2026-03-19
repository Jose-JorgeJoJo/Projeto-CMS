<?php

class CaracteristicaList {
    private $html;

    public function __construct() {
        $this->html = file_get_contents('cms/html/caracteristicalist.html');
    }

    public function delete($request) {
        $id = $request['id'] ?? null;

        if ($id) {
            Caracteristica::delete($id);
            header("Location: index.php?class=CaracteristicaList&status=deletado");
            exit;
        }
    }

    public function show() {
        $dados = Caracteristica::get();
        $linhas = "";

        foreach ($dados as $c) {
            $linhas .= "<tr>";
            $linhas .= "<td>{$c['id']}</td>";
            $linhas .= "<td>{$c['titulo']}</td>";
            $linhas .= "<td>{$c['descricao']}</td>";
            $linhas .= "<td>";
            
            $linhas .= "<a href='index.php?class=CaracteristicaForm&method=edit&id={$c['id']}'>Editar</a> | ";
            $linhas .= "<a href='index.php?class=CaracteristicaList&method=delete&id={$c['id']}' 
                        onclick='return confirm(\"Deseja excluir?\")'>Excluir</a>";
            $linhas .= "</td>";
            $linhas .= "</tr>";
        }

        echo str_replace('{tabela}', $linhas, $this->html);
    }
}