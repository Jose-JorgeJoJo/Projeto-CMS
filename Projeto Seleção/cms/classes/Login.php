<?php


class Login {
    private $html;
    private $erro;

    public function __construct() {
        $this->html = file_get_contents('cms/html/login.html');
    }

   
    public function logingin($param) {
        if ($_POST) {
            $login = $_POST['login'];
            $senha = $_POST['senha'];

            $usuario = Usuario::login($login, $senha);

            if ($usuario) {
                $_SESSION['usuario'] = 'usuario';
               
                header("Location: index.php?class=Dashboard");
                exit;
            } else {
                $this->erro = "Usuário ou senha inválidos!";
            }
        }
    }

    public function show() {
        
        $mensagem = $this->erro ? "<p style='color:red'>{$this->erro}</p>" : "";
        echo str_replace('{erro}', $mensagem, $this->html);
    }
    public function logout() {
    session_destroy();
    header("Location: index.php?class=Login");
    exit;
}       
}
