<?php

session_start();

if(!isset($_SESSION['usuario'])){

header("Location: login.php");
exit;

}

?>

<h1>Dashboard</h1>

<p>Bem vindo <?php echo $_SESSION['usuario']['login']; ?></p>

<a href="usuarios/list.php">
    <button> Usuários</button>
</a><br><br>
<a href="preferencias/form.php">
    <button> Preferências</button>
</a><br><br>
<a href="caracteristicas/list.php">
    <button> Características</button>
</a><br><br>
<a href="testemunho/list.php">
    <button>Testemunhos</button>
</a><br><br>
<a href="mensagens/list.php">
    <button>Mensagens</button>
</a><br><br>


<a href="logout.php">Sair</a>