<?php

class UsuarioList {
    private $html;

    public function __construct() {
        // Carrega o esqueleto da página
        $this->html = file_get_contents('cms/html/usuariolist.html');
    }

    /**
     * Este método substitui o seu antigo arquivo delete.php
     * Ele é chamado pelo index.php quando a URL tem &method=delete
     */
    public function delete($request) {
        $id = $request['id'] ?? null;
        $usuarioSessao = $_SESSION['usuario'] ?? null;

        // 1. 🔒 Verifica se está logado e se é admin (ID 1)
        // O is_array evita o erro "Cannot access offset of type string"
        if (!is_array($usuarioSessao) || $usuarioSessao['id'] !== 1) {
            die("Acesso negado: Somente o administrador principal pode excluir usuários.");
        }

        // 2. Verifica se o ID foi passado
        if (!$id) {
            die("Erro: ID inválido.");
        }

        // 3. 🔒 Impede o admin de se auto-excluir
        if ($id == 1) {
            die("Erro: O administrador principal não pode ser removido.");
        }

        // 4. Executa a exclusão através da classe Usuario (Model)
        Usuario::delete($id);

        // 5. Redireciona de volta para a listagem através do Maestro
        header("Location: index.php?class=UsuarioList&status=sucesso");
        exit;
    }

    public function show() {
        $usuarios = Usuario::all();
        $linhas = "";

        // Pegamos os dados da sessão com segurança para a lógica da tabela
        $usuarioLogado = $_SESSION['usuario'] ?? null;
        $idLogado = is_array($usuarioLogado) ? $usuarioLogado['id'] : null;

        foreach ($usuarios as $user) {
            $linhas .= "<tr>";
            $linhas .= "<td>{$user['id']}</td>";
            $linhas .= "<td>{$user['login']}</td>";
            $linhas .= "<td>";

            // Só mostra o botão de excluir se o logado for Admin e não for o próprio Admin
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