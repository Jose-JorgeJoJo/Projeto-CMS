<?php

require_once "../classes/Caracteristicas.php";

$dados = [];

if(isset($_GET['id'])){
    $dados = Caracteristica::find($_GET['id']);
}

if($_POST){

    try{
        Caracteristica::save($_POST);
        header("Location: list.php?sucesso=1");
    }catch(Exception $e){
        header("Location: list.php?erro=1");
    }

    exit;
}
?>

<a href="list.php">← Voltar</a>

<h2><?php echo isset($dados['id']) ? 'Editar' : 'Nova'; ?> Característica</h2>

<form method="post">

<input type="hidden" name="id" value="<?php echo $dados['id'] ?? ''; ?>">

<label>Título</label>
<input type="text" name="titulo"
value="<?php echo $dados['titulo'] ?? ''; ?>" required>

<label>Descrição</label>
<textarea name="descricao" required>
<?php echo $dados['descricao'] ?? ''; ?>
</textarea>

<br><br>

<button type="submit">Salvar</button>

</form>