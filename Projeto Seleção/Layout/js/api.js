//Mensagem de sucesso
document.addEventListener("DOMContentLoaded", function () {
  const params = new URLSearchParams(window.location.search);
  const sucesso = params.get("sucesso");

  console.log("param sucesso:", sucesso);

  if (sucesso === "1") {
    const msg = document.getElementById("msg_alert");

    console.log("msg element:", msg);

    if (msg) {
      msg.style.display = "block";
    } else {
      console.error("Elemento #msg_alert não encontrado");
    }

    window.history.replaceState({}, document.title, window.location.pathname);
  }
});

//Preferências
document.addEventListener("DOMContentLoaded", function () {
  fetch("../cms/api/api.php")
    .then((res) => res.json())
    .then((data) => {
      const pref = data.preferencias;

      const base = "../";

      const getImg = (path) => {
        if (!path) return "";
        if (path.startsWith("http")) return path;
        return base + path;
      };
      
      if (pref.favicon) {
        document.getElementById("favicon").href = getImg(pref.favicon);
      }

      document.getElementById("titulo_landing").innerText =
        pref.titulo_landing || "";

      if (pref.logo_cabecalho) {
        document.getElementById("logo_cabecalho").src = getImg(pref.logo_cabecalho);
      }

      //Home
      document.getElementById("titulo_home").innerText =
        pref.titulo_home || "";
      document.getElementById("subtitulo_home").innerText =
        pref.subtitulo_home || "";

      if (pref.imagem_home) {
        document.getElementById("imagem_home").src = getImg(pref.imagem_home);
      }

      document.getElementById("texto_titulo_caracteristicas").innerText =
        pref.titulo_caracteristicas || "";

      document.getElementById("titulo_testemunho").innerText =
        pref.titulo_testemunho || "";

      if (pref.imagem_loja) {
        document.getElementById("imagem_loja").src = getImg(pref.imagem_loja);
      }

      document.getElementById("titulo_loja").innerText = 
      pref.titulo_loja || "";

      document.getElementById("subtitulo_loja").innerText =
        pref.subtitulo_loja || "";

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

      document.getElementById("link_appstore").href =
        pref.link_appstore || "";

      document.getElementById("link_playstore").href =
        pref.link_playstore || "";

      document.getElementById("link_facebook").href = 
        pref.link_facebook || "";

      document.getElementById("link_instagram").href =
        pref.link_instagram || "";

      if (pref.logo_rodape) {
        document.getElementById("logo_rodape").src = getImg(pref.logo_rodape);
      }

      document.getElementById("telefone").innerText = pref.telefone || "";

      document.getElementById("copyright").innerText =
        pref.mensagem_copyright || "";

      document.getElementById("powered").innerText =
        pref.mensagem_powered || "";

      document.getElementById("url_rodape").href = pref.url_rodape || "";

      document.getElementById("link_facebook_fotter").href =
        pref.link_facebook || "";

      document.getElementById("link_instagram_fotter").href =
        pref.link_instagram || "";

      //Características
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

          if ((index + 1) % 2 === 0) {
            html += '</div><div class="col-lg-6">';
          }
        });

        html += "</div>";

        container.innerHTML = html;
      }

      //Testemunhos
      const containerTest = document.getElementById("lista_testemunhos");

      if (containerTest && data.testemunhos?.length > 0) {
        let html = "";

        data.testemunhos.forEach((item) => {
          html += `
 <div class="item">
        <div class="testi-box position-relative overflow-hidden bg-white shadow-sm rounded-4">
            <div class="row g-0 align-items-stretch">
                <div class="col-md-5">
                    <img src="${getImg(item.imagem_fundo)}" class="img-fluid h-100 w-100 object-fit-cover" style="min-height: 350px; max-height: 450px;" alt="Background">
                </div>
                <div class="col-md-7 d-flex align-items-center">
                    <div class="p-4 p-md-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-shrink-0">
                                <img src="${getImg(item.foto)}" class="rounded-circle shadow-sm" style="width: 55px; height: 55px; object-fit: cover; flex-shrink: 0;">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-0 fw-bold text-dark">${item.nome || ""}</h6>
                                <p class="text-muted mb-0 small">${item.funcao || ""}</p>
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <h5 class="fw-bold mb-3 text-dark">${item.titulo || ""}</h5>
                            <p class="text-muted f-14 lh-base">${item.descricao || ""}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
`;
        });

        containerTest.innerHTML = html;

        setTimeout(() => {
          const el = $("#lista_testemunhos");

          // Destrói qualquer instância anterior para evitar duplicidade
          el.owlCarousel("destroy");

          // Inicializa com as configurações corretas
          el.owlCarousel({
            items: 1,
            loop: true,
            margin: 10,
            nav: false,
            dots: true, // Garante que os pontos sejam criados
            dotsEach: true, // Cria um ponto para cada item
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 450,
          });
        }, 100);
      }
      setTimeout(() => {
        var owl = $("#lista_testemunhos");

        owl.owlCarousel({
          items: 1,
          loop: true,
          margin: 10,
          autoplay: true,
          dots: true, // Ativa os pontos
          dotsData: false,
          responsive: {
            0: { items: 1 },
            600: { items: 1 },
            1000: { items: 1 },
          },
        });

        // Força o refresh após injetar dados
        owl.trigger("refresh.owl.carousel");
      }, 300);
    })
    .catch((err) => {
      console.error("Erro ao carregar API:", err);
    });
});
