<?php

require_once "../classes/Usuario.php";

if($_POST){

$login = $_POST['login'];
$senha = $_POST['senha'];

Usuario::save([
"login"=>$login,
"senha"=>$senha
]);

header("Location: list.php");
exit;

}

?>

<h2>Novo Usuário</h2>

<form method="post">

<input type="text" name="login" placeholder="Login" required>

<input type="password" name="senha" placeholder="Senha" required>

<button>Salvar</button>

</form>