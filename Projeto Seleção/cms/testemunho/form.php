<?php
require_once '../classes/Testemunho.php';

$dados = Testemunho::get();
$dados = [
    'id' => '', 'nome' => '', 'funcao' => '', 
    'titulo' => '', 'descricao' => '', 'foto' => '', 'imagem_fundo' => ''
];


if (isset($_GET['id'])) {
    $registro = Testemunho::getById($_GET['id']);
    
    if ($registro) {
        $dados = $registro; 
    }
}

if($_POST){
    Testemunho::save($_POST);
    header("Location: form.php?sucesso=1");
    exit;


}
?>

<a href="../dashboard.php">← Dashboard</a>

<h2>Configurações de Testemunhos</h2>

<form method="post">

<label for="id">Id:</label>
<input type="text" name="id" placeholder="Id " readonly="1"
value="<?php echo $dados['id'] ?? ''; ?>"><br><br>

<label for="nome">Nome:</label>
<input type="text" name="nome" placeholder="Nome"
value="<?php echo $dados['nome'] ?? ''; ?>"><br><br>

<label for="funcao">Função:</label>
<input type="text" name="funcao" placeholder="Função"
value="<?php echo $dados['funcao'] ?? ''; ?>"><br><br>

<label for="titulo">Título:</label>
<input type="text" name="titulo" placeholder="Título"
value="<?php echo $dados['titulo'] ?? ''; ?>"><br><br>

<label for="descricao">Descrição:</label>
<input type="text" name="descricao" placeholder="Descrição"
value="<?php echo $dados['descricao'] ?? ''; ?>"><br><br>

<label for="foto">Foto:</label>
<input type="text" name="foto" placeholder="Foto"
value="<?php echo $dados['foto'] ?? ''; ?>"><br><br>

<label for="imagem_fundo">Imagem de Fundo:</label>
<input type="text" name="imagem_fundo" placeholder="Imagem de Fundo"
value="<?php echo $dados['imagem_fundo'] ?? ''; ?>"><br><br>

<button type="submit">Salvar</button>

<?php if(isset($_GET['sucesso'])): ?>
    <p style="color:green;">✔ Alterado com sucesso!</p>
<?php endif; ?>

</form>