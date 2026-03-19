document.addEventListener("DOMContentLoaded", function () {
  fetch("../cms/api/api.php")
    .then((res) => res.json())
    .then((data) => {
      const pref = data.preferencias; // 👈 ESSENCIAL
      console.log(pref);

      // ✅ CAMINHO BASE CORRETO
      const base = "../";

      const getImg = (path) => {
        if (!path) return "";
        if (path.startsWith("http")) return path; // imagem externa
        return base + path; // uploads/arquivo.jpg
      };

      // ✅ favicon
      if (pref.favicon) {
        document.getElementById("favicon").href = getImg(pref.favicon);
      }

      // ✅ logo
      if (pref.logo_cabecalho) {
        document.getElementById("logo").src = getImg(pref.logo_cabecalho);
      }

      // ✅ títulos
      document.getElementById("subtitulo_home").innerText =
        pref.subtitulo_home || "";

      // ✅ imagem home
      if (pref.imagem_home) {
        document.getElementById("imagem_home").src = getImg(pref.imagem_home);
      }

      // ✅ seção características

      document.getElementById("titulo_caracteristicas").innerText =
        pref.titulo_caracteristicas || "";

      // ✅ testemunho
      document.getElementById("titulo_testemunho").innerText =
        pref.titulo_testemunho || "";

      // ✅ loja
      if (pref.imagem_loja) {
        const el = document.getElementById("imagem_loja");
        if (el) el.src = getImg(data.imagem_loja);
      }

      // ✅ loja
      document.getElementById("titulo_loja").innerText = pref.titulo_loja || "";

      document.getElementById("subtitulo_loja").innerText =
        pref.subtitulo_loja || "";
      // ✅ app store / play store
      if (pref.imagem_appstore) {
        document.getElementById("img_appstore").src = getImg(
          pref.imagem_appstore,
        );
      }

      if (pref.imagem_playstore) {
        document.getElementById("img_playstore").src = getImg(
          pref.imagem_playstore,
        );
      }

      if (pref.link_appstore) {
        document.getElementById("link_appstore").href = pref.link_appstore;
      }

      if (pref.link_playstore) {
        document.getElementById("link_playstore").href = pref.link_playstore;
      }

      // ✅ redes sociais
      if (pref.link_facebook) {
        document.getElementById("link_facebook").href = pref.link_facebook;
      }

      if (pref.link_instagram) {
        document.getElementById("link_instagram").href = pref.link_instagram;
      }

      if (pref.imagem_facebook) {
        document.getElementById("img_facebook").src = getImg(
          pref.imagem_facebook,
        );
      }

      if (pref.imagem_instagram) {
        document.getElementById("img_instagram").src = getImg(
          pref.imagem_instagram,
        );
      }

      // ✅ rodapé
      if (pref.logo_rodape) {
        document.getElementById("logo_rodape").src = getImg(pref.logo_rodape);
      }

      document.getElementById("telefone").innerText = pref.telefone || "";
      document.getElementById("copyright").innerText =
        pref.mensagem_copyright || "";
      document.getElementById("powered").innerText =
        pref.mensagem_powered || "";

      if (pref.url_rodape) {
        document.getElementById("url_rodape").href = pref.url_rodape;
      }

      if (pref.imagem_facebook) {
        document.getElementById("img_facebook_fotter").src = getImg(
          pref.imagem_facebook,
        );
      }

      if (pref.imagem_instagram) {
        document.getElementById("img_instagram_fotter").src = getImg(
          pref.imagem_instagram,
        );
      }

      if (pref.link_facebook) {
        document.getElementById("link_facebook_fotter").href =
          pref.link_facebook;
      }

      if (pref.link_instagram) {
        document.getElementById("link_instagram_fotter").href =
          pref.link_instagram;
      }

      const container = document.getElementById("lista_caracteristicas");

      if (container && data.caracteristicas) {
        let html = '<div class="col-lg-6">';

        data.caracteristicas.forEach((item, index) => {
          html += `
            <div class="features-box mt-4">
                <div class="d-flex">
                    <div class="heading" style="height: 255px;">
                        <h6 class="d-flex align-items-center mt-1">
                            <i style="font-size: 30px;" class="mdi mdi-check-circle me-2"></i>
                            ${item.titulo}
                        </h6>
                        <p class="text-muted">${item.descricao}</p>
                    </div>
                </div>
            </div>
        `;

          // quebra coluna (2 itens por coluna)
          if ((index + 1) % 2 === 0) {
            html += '</div><div class="col-lg-6">';
          }
        });

        html += "</div>";

        container.innerHTML = html;
      }

      const containerTest = document.getElementById("lista_testemunhos");

      if (containerTest && data.testemunhos) {
        let html = "";

        data.testemunhos.forEach((item) => {
          html += `
        <div class="item">
            <div class="testi-box position-relative overflow-hidden">
                <div class="row align-items-center">

                    <div class="col-md-5">
                        <img src="${getImg(item.imagem_fundo)}" class="img-fluid">
                    </div>

                    <div class="col-md-7">
                        <div class="p-4">

                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <img src="${getImg(item.foto)}" class="img-fluid rounded-circle">
                                </div>

                                <div class="ms-3">
                                    <p class="fw-bold mb-0">${item.nome}</p>
                                    <p class="text-muted mb-0">${item.funcao}</p>
                                </div>
                            </div>

                            <div class="mt-3">
                                <h5 class="fw-bold">${item.titulo}</h5>
                                <p class="text-muted">${item.descricao}</p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        `;
        });

        containerTest.innerHTML = html;
      }
    })
    .catch((err) => {
      console.error("Erro ao carregar API:", err);
    });
});
