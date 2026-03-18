<?php

require_once "../classes/Preferencia.php";

$dados = Preferencia::get();


if($_POST){
    Preferencia::save($_POST);
    header("Location: form.php?sucesso=1");
    exit;


}

?>

<a href="../dashboard.php">← Dashboard</a>

<h2>Configurações da Landing Page</h2>

<form method="post">

<label for="titulo_landing">Título Landing:</label>
<input type="text" name="titulo_landing" placeholder="Título Landing"
value="<?php echo $dados['titulo_landing'] ?? ''; ?>"><br><br>

<label for="favicon">Favicon:</label>
<input type="text" name="favicon" placeholder="Favicon"
value="<?php echo $dados['favicon'] ?? ''; ?>"><br><br>

<label for="logo_cabecalho">Logo Cabeçalho:</label>
<input type="text" name="logo_cabecalho" placeholder="Logo Cabeçalho"
value="<?php echo $dados['logo_cabecalho'] ?? ''; ?>"><br><br>

<label for="link_facebook">Link Facebook:</label>
<input type="text" name="link_facebook" placeholder="Facebook"
value="<?php echo $dados['link_facebook'] ?? ''; ?>"><br><br>

<label for="imagem_facebook">Imagem Facebook:</label>
<input type="text" name="imagem_facebook" placeholder="Imagem Facebook"
value="<?php echo $dados['imagem_facebook'] ?? ''; ?>"><br><br>

<label for="link_instagram">Link Instagram:</label>
<input type="text" name="link_instagram" placeholder="Instagram"
value="<?php echo $dados['link_instagram'] ?? ''; ?>"><br><br>


<label for="imagem_instagram">Imagem Instagram:</label>
<input type="text" name="imagem_instagram" placeholder="Imagem Instagram"
value="<?php echo $dados['imagem_instagram'] ?? ''; ?>"><br><br>


<label for="titulo_home">Título Home:</label>
<input type="text" name="titulo_home" placeholder="Título Home"
value="<?php echo $dados['titulo_home'] ?? ''; ?>"><br><br>


<label for="subtitulo_home">Subtítulo Home:</label>
<input type="text" name="subtitulo_home" placeholder="Subtítulo"
value="<?php echo $dados['subtitulo_home'] ?? ''; ?>"><br><br>


<label for="imagem_home">Imagem Home</label>
<input type="text" name="imagem_home" placeholder="Imagem Home"
value="<?php echo $dados['imagem_home'] ?? ''; ?>"><br><br>

<label for="titulo_caracteristicas">Título Características:</label>
<input type="text" name="titulo_caracteristicas" placeholder="Título Características"
value="<?php echo $dados['titulo_caracteristicas'] ?? ''; ?>"><br><br>

<label for="titulo_testemunho">Título Testemunho:</label>
<input type="text" name="titulo_testemunho" placeholder="Título Testemunho"
value="<?php echo $dados['titulo_testemunho'] ?? ''; ?>"><br><br>

<label for="titulo_loja">Título Loja:</label>
<input type="text" name="titulo_loja" placeholder="Título Loja"
value="<?php echo $dados['titulo_loja'] ?? ''; ?>"><br><br>

<label for="subtitulo_loja">Subtítulo Loja:</label>
<input type="text" name="subtitulo_loja" placeholder="Subtítulo Loja"
value="<?php echo $dados['subtitulo_loja'] ?? ''; ?>"><br><br>

<label for="imagem_loja">Imagem Loja:</label>
<input type="text" name="imagem_loja" placeholder="Imagem Loja"
value="<?php echo $dados['imagem_loja'] ?? ''; ?>"><br><br>

<label for="imagem_appstore">Imagem App Store:</label>
<input type="text" name="imagem_appstore" placeholder="Imagem App Store"
value="<?php echo $dados['imagem_appstore'] ?? ''; ?>"><br><br>

<label for="link_appstore">Link App Store:</label>
<input type="text" name="link_appstore" placeholder="Link App Store"
value="<?php echo $dados['link_appstore'] ?? ''; ?>"><br><br>

<label for="imagem_playstore">Imagem Play Store:</label>
<input type="text" name="imagem_playstore" placeholder="Imagem Play Store"
value="<?php echo $dados['imagem_playstore'] ?? ''; ?>"><br><br>

<label for="link_playstore">Link Play Store:</label>
<input type="text" name="link_playstore" placeholder="Link Play Store"
value="<?php echo $dados['link_playstore'] ?? ''; ?>"><br><br>

<label for="telefone">Telefone:</label>
<input type="text" name="telefone" placeholder="Telefone"
value="<?php echo $dados['telefone'] ?? ''; ?>"><br><br>

<label for="logo_rodape">Logo Rodapé:</label>
<input type="text" name="logo_rodape" placeholder="Logo Rodapé"
value="<?php echo $dados['logo_rodape'] ?? ''; ?>"><br><br>

<label for="mensagem_copyright">Mensagem Copyright:</label>
<input type="text" name="mensagem_copyright" placeholder="Mensagem Copyright"
value="<?php echo $dados['mensagem_copyright'] ?? ''; ?>"><br><br>

<label for="url_rodape">URL Rodapé:</label>
<input type="text" name="url_rodape" placeholder="URL Rodapé"
value="<?php echo $dados['url_rodape'] ?? ''; ?>"><br><br>

<label for="mensagem_powered">Mensagem Powered:</label>
<input type="text" name="mensagem_powered" placeholder="Mensagem Powered"
value="<?php echo $dados['mensagem_powered'] ?? ''; ?>"><br><br>


<button type="submit">Salvar</button>

<?php if(isset($_GET['sucesso'])): ?>
    <p style="color:green;">✔ Alterado com sucesso!</p>
<?php endif; ?>

</form>