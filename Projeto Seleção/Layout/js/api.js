fetch('../cms/api/api.php')
.then(res => res.json())
.then(data => {

    console.log(data);

    // ✅ favicon
    if(data.favicon){
        document.getElementById("favicon").href = data.favicon;
    }

    // ✅ logo
    if(data.logo_cabecalho){
        document.getElementById("logo").src = data.logo_cabecalho;
    }

    // ✅ títulos
    document.getElementById("titulo_home").innerText = data.titulo_home || '';
    document.getElementById("subtitulo_home").innerText = data.subtitulo_home || '';

    // ✅ imagem home
    if(data.imagem_home){
        document.getElementById("imagem_home").src = data.imagem_home;
    }

    // ✅ seção características
    document.getElementById("titulo_caracteristicas").innerText =
        data.titulo_caracteristicas || '';

    // ✅ testemunho
    document.getElementById("titulo_testemunho").innerText =
        data.titulo_testemunho || '';

    // ✅ loja
    document.getElementById("titulo_loja").innerText =
        data.titulo_loja || '';

    document.getElementById("subtitulo_loja").innerText =
        data.subtitulo_loja || '';

    if(data.imagem_loja){
        document.getElementById("imagem_loja").src = data.imagem_loja;
    }

    // ✅ app store / play store
    if(data.imagem_appstore){
        document.getElementById("img_appstore").src = data.imagem_appstore;
    }

    if(data.imagem_playstore){
        document.getElementById("img_playstore").src = data.imagem_playstore;
    }

    if(data.link_appstore){
        document.getElementById("link_appstore").href = data.link_appstore;
    }

    if(data.link_playstore){
        document.getElementById("link_playstore").href = data.link_playstore;
    }

    // ✅ redes sociais
    if(data.link_facebook){
        document.getElementById("link_facebook").href = data.link_facebook;
    }

    if(data.link_instagram){
        document.getElementById("link_instagram").href = data.link_instagram;
    }

    if(data.imagem_facebook){
        document.getElementById("img_facebook").src = data.imagem_facebook;
    }

    if(data.imagem_instagram){
        document.getElementById("img_instagram").src = data.imagem_instagram;
    }

    // ✅ rodapé
    if(data.logo_rodape){
        document.getElementById("logo_rodape").src = data.logo_rodape;
    }

    document.getElementById("telefone").innerText = data.telefone;

    document.getElementById("copyright").innerText =
        data.mensagem_copyright || '';

    if(data.url_rodape){
        document.getElementById("url_rodape").href = data.url_rodape;
    }

    document.getElementById("powered").innerText =
        data.mensagem_powered || '';

});