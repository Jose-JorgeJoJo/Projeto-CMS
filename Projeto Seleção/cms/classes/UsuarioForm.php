<?php

class UsuarioForm {
    private $html;

    public function __construct() {
        // Carrega o arquivo HTML externo
        $this->html = file_get_contents('cms/html/usuarioform.html');
    }

    /**
     * Método chamado quando o formulário é enviado
     * URL: index.php?class=UsuarioForm&method=save
     */
    public function save($request) {
        if ($_POST) {
            $login = $_POST['login'] ?? '';
            $senha = $_POST['senha'] ?? '';

            if (!empty($login) && !empty($senha)) {
                // Chama o Model Usuario (Autoload cuida do require)
                Usuario::save([
                    "login" => $login,
                    "senha" => $senha // Lembre-se de usar password_hash no Model se possível
                ]);

                // Após salvar, volta para a listagem via Maestro
                header("Location: index.php?class=UsuarioList&msg=sucesso");
                exit;
            }
        }
    }

    public function show() {
        // Apenas imprime o HTML carregado no construtor
        echo $this->html;
    }
}