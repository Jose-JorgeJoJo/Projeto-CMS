<?php

class TestemunhoList {
    private $html;

    public function __construct() {
        // Ajuste o caminho conforme sua estrutura (se estiver dentro de cms/html/)
        $this->html = file_get_contents('cms/html/testemunholist.html');
    }

    public function delete($request) {
        $id = $request['id'] ?? null;
        if ($id) {
            Testemunho::delete($id);
            header("Location: index.php?class=TestemunhoList");
            exit;
        }
    }

    public function show() {
        $testemunhos = Testemunho::get();
        $linhas = "";

        foreach ($testemunhos as $t) {
            $linhas .= "<tr>";
            $linhas .= "<td>{$t['id']}</td>";
            $linhas .= "<td>{$t['nome']}</td>";
            $linhas .= "<td>{$t['funcao']}</td>";
            $linhas .= "<td>{$t['titulo']}</td>";
            $linhas .= "<td>{$t['descricao']}</td>";
            $linhas .= "<td>{$t['foto']}</td>";
            $linhas .= "<td>{$t['imagem_fundo']}</td>";
            $linhas .= "<td>";
            // IMPORTANTE: Link formatado para o seu index.php
            $linhas .= "<a href='index.php?class=TestemunhoForm&method=edit&id={$t['id']}'>Editar</a> | ";
            $linhas .= "<a href='index.php?class=TestemunhoList&method=delete&id={$t['id']}' 
                        onclick='return confirm(\"Deseja excluir?\")'>Excluir</a>";
            $linhas .= "</td>";
            $linhas .= "</tr>";
        }

        echo str_replace('{tabela}', $linhas, $this->html);
    }
}