<?php

session_start();

require_once "../classes/Usuario.php";

$usuarios = Usuario::all();

?>

<a href="../dashboard.php">
<button>← Voltar ao Dashboard</button>
</a>

<h2>Usuários</h2>

<a href="form.php">Novo Usuário</a>

<table border="1">

<tr>
<th>ID</th>
<th>Login</th>
<th>Ações</th>
</tr>

<?php foreach($usuarios as $usuario): ?>

<tr>

<td><?php echo $usuario['id']; ?></td>
<td><?php echo $usuario['login']; ?></td>

<td>

<?php if($usuario['id'] != 1): ?>

<a href="delete.php?id=<?php echo $usuario['id']; ?>">
Excluir
</a>

<?php else: ?>

Admin protegido

<?php endif; ?>

</td>

</tr>

<?php endforeach; ?>

</table>