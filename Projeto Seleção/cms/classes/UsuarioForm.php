<?php

class UsuarioForm {
    private $html;

    public function __construct() {
        $this->html = file_get_contents('cms/html/usuarioform.html');
    }


    public function save($request) {
        if ($_POST) {
            $login = $_POST['login'] ?? '';
            $senha = $_POST['senha'] ?? '';

            if (!empty($login) && !empty($senha)) {
                Usuario::save([
                    "login" => $login,
                    "senha" => $senha 
                ]);

                header("Location: index.php?class=UsuarioList&msg=sucesso");
                exit;
            }
        }
    }

    public function show() {
        echo $this->html;
    }
}