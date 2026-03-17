<?php

session_start();
require_once "../classes/Caracteristicas.php";

$dados = Caracteristica::all();
?>

<a href="../dashboard.php">← Dashboard</a>

<h2>Características da Home</h2>

<a href="form.php"> Nova Característica</a>

<table border="1">

<tr>
<th>ID</th>
<th>Título</th>
<th>Descrição</th>
<th>Ações</th>
</tr>

<?php foreach($dados as $c): ?>

<tr>

<td><?php echo $c['id']; ?></td>
<td><?php echo $c['titulo']; ?></td>
<td><?php echo $c['descricao']; ?></td>

<td>
<a href="form.php?id=<?php echo $c['id']; ?>">Editar</a>
<a href="delete.php?id=<?php echo $c['id']; ?>">Excluir</a>
</td>

</tr>

<?php endforeach; ?>

</table>