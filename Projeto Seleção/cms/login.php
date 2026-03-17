<?php

session_start();

require_once "classes/Usuario.php";

if($_POST){

$login = $_POST['login'];
$senha = $_POST['senha'];

$usuario = Usuario::login($login,$senha);

if($usuario){

$_SESSION['usuario'] = $usuario['login'];

header("Location: dashboard.php");
exit;

}else{

$erro = "Login inválido";

}

}

?>

<h2>Login CMS</h2>

<?php if(isset($erro)) echo $erro; ?>

<form method="post">

<input type="text" name="login" placeholder="Login">

<input type="password" name="senha" placeholder="Senha">

<button type="submit">Entrar</button>

</form>