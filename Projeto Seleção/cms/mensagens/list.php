<?php

session_start();
require_once "../classes/Mensagem.php";

$mensagens = Mensagem::all();
?>

<a href="../dashboard.php">← Dashboard</a>

<h2>Mensagens Recebidas</h2>

<table border="1">

<tr>
<th>ID</th>
<th>Nome</th>
<th>Email</th>
<th>Telefone</th>
<th>Mensagem</th>
<th>Data</th>
</tr>

<?php foreach($mensagens as $m): ?>

<tr>

<td><?php echo $m['id']; ?></td>
<td><?php echo htmlspecialchars($m['nome']); ?></td>
<td><?php echo htmlspecialchars($m['email']); ?></td>
<td><?php echo htmlspecialchars($m['telefone']); ?></td>
<td><?php echo nl2br(htmlspecialchars($m['mensagem'])); ?></td>
<td><?php echo date("d/m/Y H:i", strtotime($m['data'])); ?></td>

</tr>

<?php endforeach; ?>

</table>