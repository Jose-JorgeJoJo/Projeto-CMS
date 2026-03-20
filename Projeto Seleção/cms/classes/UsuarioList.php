<?php

class UsuarioList {
    private $html;

    public function __construct() {
        
        $this->html = file_get_contents('cms/html/usuariolist.html');
    }

  
    public function delete($request) {
        $id = $request['id'] ?? null;
        $usuarioSessao = $_SESSION['usuario'] ?? null;


        if (!is_array($usuarioSessao) || $usuarioSessao['id'] !== 1) {
            die("Acesso negado: Somente o administrador principal pode excluir usuários.");
        }


        if (!$id) {
            die("Erro: ID inválido.");
        }


        if ($id == 1) {
            die("Erro: O administrador principal não pode ser removido.");
        }


        Usuario::delete($id);


        header("Location: index.php?class=UsuarioList&status=sucesso");
        exit;
    }

    public function show() {
        $usuarios = Usuario::all();
        $linhas = "";


        $usuarioLogado = $_SESSION['usuario'] ?? null;
        $idLogado = is_array($usuarioLogado) ? $usuarioLogado['id'] : null;

        foreach ($usuarios as $user) {
            $linhas .= "<tr>";
            $linhas .= "<td>{$user['id']}</td>";
            $linhas .= "<td>{$user['login']}</td>";
            $linhas .= "<td>";


            if ($idLogado === 1) {
                if ($user['id'] != 1) {
                    $linhas .= "<a href='index.php?class=UsuarioList&method=delete&id={$user['id']}' 
                                onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a>";
                } else {
                    $linhas .= "<em>Admin Protegido</em>";
                }
            } else {
                $linhas .= "<span style='color:gray'>Sem permissão</span>";
            }

            $linhas .= "</td>";
            $linhas .= "</tr>";
        }

        echo str_replace('{tabela}', $linhas, $this->html);
    }
}