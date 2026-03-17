<?php
session_start();

require_once '../classes/Testemunho.php';

$testemunhos = Testemunho::get();

?>

<a href="../dashboard.php">
<button>← Voltar ao Dashboard</button>
</a>

<h2>Testemunhos</h2>

<a href="form.php">Novo Testemunho</a>

<table border="1">

<tr>
<th>ID</th>
<th>Nome</th>
<th>Função</th>
<th>Título</th>
<th>Descrição</th>
<th>Foto</th>
<th>Imagem de Fundo</th>

</tr>

<?php foreach($testemunhos as $testemunho): ?>

<tr>

<td><?php echo $testemunho['id']; ?></td>
<td><?php echo $testemunho['nome']; ?></td>
<td><?php echo $testemunho['funcao']; ?></td>
<td><?php echo $testemunho['titulo']; ?></td>
<td><?php echo $testemunho['descricao']; ?></td>
<td><?php echo $testemunho['foto']; ?></td>
<td><?php echo $testemunho['imagem_fundo']; ?></td>

</tr>
<?php endforeach; ?></table>