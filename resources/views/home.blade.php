<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divina Essência</title>


    <link rel="stylesheet" href="{{ asset('/css/app.css')}}"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <header class="o-header">
        <div class="o-header__top">
            <div class="a-logo">
                <a href="/home">
                    <img src="img/Logo.png" alt="Divina Essência">
                </a>
            </div>
    
            <div class="m-search">
                <div class="search-container">
                    <input type="text" class="a-input" placeholder="O que procura?">
                    <i class="bi bi-search search-icon"></i>
                </div>
            </div>
    
            <div class="m-user-options">
                <div class="m-user-menu-trigger">
                    <i class="a-icon bi bi-box-arrow-in-right" id="login-icon"></i>
    
                    <div class="m-user-dropdown" id="user-dropdown-menu">
                        <a href="/minha conta" class="a-dropdown-link">Minha conta</a>
                        <a href="/meus pedidos" class="a-dropdown-link">Meus Pedidos</a>
                        <a href="/sair" class="a-dropdown-link">Sair</a>
                    </div>
                </div>
                
                <a href="/carrinho" class="a-icon-link" id="cart-icon-link">
                    <i class="a-icon bi bi-bag"></i>
                </a>
                
                
                <a href="/favoritos" class="a-icon-link">
                    <i class="a-icon bi bi-heart"></i>
                </a>
            </div>
        </div>
    
        <nav class="m-menu">
            <button class="a-hamburger-btn" aria-expanded="false" aria-controls="menu-list">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <ul class="m-menu__list" id="menu-list"> 
                <li><a href="/sabonetes" class="a-link">SABONETES</a></li>
                <li><a href="/aromatizantes" class="a-link">AROMATIZANTES</a></li>
                <li><a href="/velas" class="a-link">VELAS</a></li>
                <li><a href="/oleos essenciais" class="a-link">ESSÊNCIAS</a></li>
                <li><a href="/acessorios" class="a-link">ACESSÓRIOS</a></li>
                <li><a href="/kits" class="a-link">KITS</a></li>
            </ul>
        </nav>
    </header>

<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/1.png" class="d-block w-100" alt="Banner 1">
      </div>
      <div class="carousel-item">
        <img src="img/2.png" class="d-block w-100" alt="Banner 2">
      </div>
      <div class="carousel-item">
        <img src="img/3.png" class="d-block w-100" alt="Banner 3">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div>
<br>

<section class="o-value-proposition" id="valores">
  <div class="m-value-row">
      
      <div class="m-value-item">
          <img src="img/sustentavel.png" alt="Sustentável">
          <p class="a-value-text">Produtos</p>
          <p class="a-value-text">sustentáveis</p>
      </div>
      
      <div class="m-value-item">
        <img src="img/coelholivre.png" alt="Não testado em animais">
          <p class="a-value-text">Não testado</p>
          <p class="a-value-text">em animais</p>
      </div>
      
      <div class="m-value-item">
        <img src="img/ecologico .png" alt="Naturais e orgânicos">
          <p class="a-value-text">Naturais e</p>
          <p class="a-value-text">orgânicos</p>
      </div>

  </div>
</section>

<section class="o-product-grid" id="novidades">
  <h2 class="a-section-title">NOVIDADES</h2>
  
    <div class="m-carousel-view" id="carousel-novidades">

        <button class="a-carousel-control a-carousel-control--prev" aria-label="Anterior">
            <i class="bi bi-chevron-left"></i>
        </button>

        <div class="m-product-row">
            <div class="m-product-card">
                 <img src="img/sbnt-canelaand White Floral Save The Date Flyer.png" alt="Sabonete Argila Rosa e Lavanda" class="a-product-img">
                  <h4 class="a-product-name">Sabonete Canela</h4> 
                  <p class="a-product-size">110g</p>
                   <h3 class="a-product-price">R$ 38,00</h3> 
                    <a href="/sabonete canela" class="a-btn-add">Adicionar</a> 
                </div>
            <div class="m-product-card">
                 <img src="img/acessorio-escova.png" alt="Bucha Vegetal" class="a-product-img"> 
                 <h4 class="a-product-name">Escova de dente</h4> 
                 <p class="a-product-size">...</p> 
                 <h3 class="a-product-price">R$ 19,20</h3> 
            <a href="/escova de dente" class="a-btn-add">Adicionar</a> 
                 </div>
            <div class="m-product-card"> 
                <img src="img/aroma-lavanda.png" alt="Aromatizador Citronela" class="a-product-img"> 
                <h4 class="a-product-name">Lavanda</h4> 
                <p class="a-product-size">250ml</p> 
                <h3 class="a-product-price">R$ 32,40</h3> 
            <a href="/aromatizador de lavanda" class="a-btn-add">Adicionar</a> 
            </div>
            <div class="m-product-card"> 
                <img src="img/vela-hiba.png" alt="Vela Blue Tansy" class="a-product-img">
                 <h4 class="a-product-name">Hiba</h4>
                  <p class="a-product-size">140g</p> 
                  <h3 class="a-product-price">R$ 23,40</h3> 
            <a href="/vela hiba" class="a-btn-add">Adicionar</a> 
                </div>
            <div class="m-product-card">
                 <img src="img/sbnt-aveiamel.png" alt="Sabonete Argila Rosa e Lavanda 2" class="a-product-img">
                  <h4 class="a-product-name">Sabonete Aveia e Mel</h4> 
                  <p class="a-product-size">110g</p> 
                  <h3 class="a-product-price">R$ 38,00</h3> 
            <a href="/Sabonete Aveia e Mel" class="a-btn-add">Adicionar</a> 
                 </div>
            <div class="m-product-card"> 
                <img src="img/acessorio-ecobag.png" alt="Bucha Vegetal 2" class="a-product-img"> 
                <h4 class="a-product-name">Bucha Vegetal </h4> 
                <p class="a-product-size">...</p>
                 <h3 class="a-product-price">R$ 60,00</h3> 
            <a href="/ecobag" class="a-btn-add">Adicionar</a> 
                </div>
            <div class="m-product-card"> 
                <img src="img/aroma-canela.png" alt="Aromatizador Citronela 2" class="a-product-img">
                 <h4 class="a-product-name">Canela</h4> 
                 <p class="a-product-size">250ml</p> 
                 <h3 class="a-product-price">R$ 32,40</h3> 
            <a href="/aromatizante de canela" class="a-btn-add">Adicionar</a> 
                 </div>
            <div class="m-product-card"> 
                <img src="img/vela-hortelapimenta.png" alt="Vela Blue Tansy 2" class="a-product-img">
                 <h4 class="a-product-name">Hortelã Pimenta</h4> 
                 <p class="a-product-size">140g</p> 
                 <h3 class="a-product-price">R$ 23,40</h3>
            <a href="/vela de hortela e pimenta" class="a-btn-add">Adicionar</a> 
                 </div>
        </div>

        <button class="a-carousel-control a-carousel-control--next" aria-label="Próximo">
            <i class="bi bi-chevron-right"></i>
        </button>

        <div class="m-carousel-indicators" aria-label="Navegação do carrossel Novidades">
            </div>

    </div>
</section>

<section class="o-category-grid" id="linhas-essencia">
  <h2 class="a-section-title">LINHAS DIVINA ESSÊNCIA</h2>
  
    <div class="m-carousel-view" id="carousel-linhas">
        
        <button class="a-carousel-control a-carousel-control--prev" aria-label="Anterior">
            <i class="bi bi-chevron-left"></i>
        </button>

        <div class="m-category-row">
            <a href="./linhas/linha-lavanda.html" class="m-category-card"> <div class="m-banner-content"> <img src="img/lavandalinha.png" alt="Linha Lavanda" class="a-banner-img"> </div> </a>
            <a href="./linhas/linha-capimlimao.html" class="m-category-card"> <div class="m-banner-content"> <img src="img/capimlimao-linha.png" alt="Linha Capim Limão" class="a-banner-img"> </div> </a>
            <a href="./linhas/linha-eucalipto.html" class="m-category-card"> <div class="m-banner-content"> <img src="img/eucalipto-linha.png" alt="Linha Eucalipto" class="a-banner-img"> </div> </a>
            <a href="./linhas/linha-camomila.html" class="m-category-card"> <div class="m-banner-content"> <img src="img/camomila-linha.png" alt="Linha Camomila" class="a-banner-img"> </div> </a>
            <a href="./linhas/linha-copaiba.html" class="m-category-card"> <div class="m-banner-content"> <img src="img/copaiba-linha.png" alt="Linha Lavanda 2" class="a-banner-img"> </div> </a>
            <a href="./linhas/linha-melaleuca.html" class="m-category-card"> <div class="m-banner-content"> <img src="img/melaleuca-linha.png" alt="Linha Capim Limão 2" class="a-banner-img"> </div> </a>
            <a href="./linhas/linha-alecrim.html" class="m-category-card"> <div class="m-banner-content"> <img src="img/alecrim-linha.png" alt="Linha Eucalipto 2" class="a-banner-img"> </div> </a>
            <a href="./linhas/linha-ylanglang.html" class="m-category-card"> <div class="m-banner-content"> <img src="img/ylanglang-linha.png" alt="Linha Camomila 2" class="a-banner-img"> </div> </a>
        </div>
        
        <button class="a-carousel-control a-carousel-control--next" aria-label="Próximo">
            <i class="bi bi-chevron-right"></i>
        </button>

        <div class="m-carousel-indicators" aria-label="Navegação do carrossel Linhas">
            </div>

    </div>
</section>

<section class="o-product-grid" id="novidades">
    <h2 class="a-section-title">NOVIDADES</h2>
    
      <div class="m-carousel-view" id="carousel-novidades">
  
          <button class="a-carousel-control a-carousel-control--prev" aria-label="Anterior">
              <i class="bi bi-chevron-left"></i>
          </button>
  
          <div class="m-product-row">
              <div class="m-product-card">
                   <img src="img/sbnt-canelaand White Floral Save The Date Flyer.png" alt="Sabonete Argila Rosa e Lavanda" class="a-product-img">
                    <h4 class="a-product-name">Sabonete Canela</h4> 
                    <p class="a-product-size">110g</p>
                     <h3 class="a-product-price">R$ 38,00</h3> 
                      <a href="/sabonete canela" class="a-btn-add">Adicionar</a> 
                  </div>
              <div class="m-product-card">
                   <img src="img/acessorio-escova.png" alt="Bucha Vegetal" class="a-product-img"> 
                   <h4 class="a-product-name">Escova de dente</h4> 
                   <p class="a-product-size">...</p> 
                   <h3 class="a-product-price">R$ 19,20</h3> 
              <a href="/escova de dente" class="a-btn-add">Adicionar</a> 
                   </div>
              <div class="m-product-card"> 
                  <img src="img/aroma-lavanda.png" alt="Aromatizador Citronela" class="a-product-img"> 
                  <h4 class="a-product-name">Lavanda</h4> 
                  <p class="a-product-size">250ml</p> 
                  <h3 class="a-product-price">R$ 32,40</h3> 
              <a href="/aromatizador de lavanda" class="a-btn-add">Adicionar</a> 
              </div>
              <div class="m-product-card"> 
                  <img src="img/vela-hiba.png" alt="Vela Blue Tansy" class="a-product-img">
                   <h4 class="a-product-name">Hiba</h4>
                    <p class="a-product-size">140g</p> 
                    <h3 class="a-product-price">R$ 23,40</h3> 
              <a href="/vela hiba" class="a-btn-add">Adicionar</a> 
                  </div>
              <div class="m-product-card">
                   <img src="img/sbnt-aveiamel.png" alt="Sabonete Argila Rosa e Lavanda 2" class="a-product-img">
                    <h4 class="a-product-name">Sabonete Aveia e Mel</h4> 
                    <p class="a-product-size">110g</p> 
                    <h3 class="a-product-price">R$ 38,00</h3> 
              <a href="/Sabonete Aveia e Mel" class="a-btn-add">Adicionar</a> 
                   </div>
              <div class="m-product-card"> 
                  <img src="img/acessorio-ecobag.png" alt="Bucha Vegetal 2" class="a-product-img"> 
                  <h4 class="a-product-name">Bucha Vegetal </h4> 
                  <p class="a-product-size">...</p>
                   <h3 class="a-product-price">R$ 60,00</h3> 
              <a href="/ecobag" class="a-btn-add">Adicionar</a> 
                  </div>
              <div class="m-product-card"> 
                  <img src="img/aroma-canela.png" alt="Aromatizador Citronela 2" class="a-product-img">
                   <h4 class="a-product-name">Canela</h4> 
                   <p class="a-product-size">250ml</p> 
                   <h3 class="a-product-price">R$ 32,40</h3> 
              <a href="/aromatizante de canela" class="a-btn-add">Adicionar</a> 
                   </div>
              <div class="m-product-card"> 
                  <img src="img/vela-hortelapimenta.png" alt="Vela Blue Tansy 2" class="a-product-img">
                   <h4 class="a-product-name">Hortelã Pimenta</h4> 
                   <p class="a-product-size">140g</p> 
                   <h3 class="a-product-price">R$ 23,40</h3>
              <a href="/vela de hortela e pimenta" class="a-btn-add">Adicionar</a> 
                   </div>
          </div>
  
          <button class="a-carousel-control a-carousel-control--next" aria-label="Próximo">
            <i class="bi bi-chevron-right"></i>
          </button>
  
          <div class="m-carousel-indicators" aria-label="Navegação do carrossel Novidades">
              </div>
  
      </div>
  </section>

<section class="o-about-section" id="about-carousel-section">
    <div class="m-about-content">
        <div class="m-about-text">
            
            <div class="m-about-slides-container">
                
                <div class="a-about-slide a-about-slide--active">
                    <p>Na Divina Essência, acreditamos que o cuidado pessoal começa na natureza. Criamos mais do que produtos: oferecemos experiências sensoriais que harmonizam corpo, mente e ambiente. Cada sabonete, vela e aroma é feito com ingredientes naturais e sustentáveis, honrando o planeta e o seu bem-estar. Nosso propósito é simples: levar a pureza da natureza e um toque de leveza para o seu dia a dia.</p>
                </div>
                
                <div class="a-about-slide">
                    <p>Com um compromisso 100% sustentável, toda a nossa linha é vegana e cruelty-free. Priorizamos ingredientes orgânicos e embalagens recicláveis, garantindo que sua jornada de bem-estar não deixe rastros negativos no planeta. Seu ritual de autocuidado é também um ato de amor pela Terra.</p>
                </div>

                <div class="a-about-slide">
                    <p>Mais que uma loja, somos uma comunidade. Nossa missão é educar e inspirar sobre os benefícios da aromaterapia e dos produtos naturais. Junte-se a nós para descobrir a essência da tranquilidade e transformar sua rotina em um refúgio de paz.</p>
                </div>

            </div>
            <div class="m-carousel-indicators" id="about-indicators" aria-label="Navegação do texto Sobre Nós">
              <button class="a-indicator a-indicator--active" data-slide-to="0" aria-label="Informação 1"></button>
              <button class="a-indicator" data-slide-to="1" aria-label="Informação 2"></button>
              <button class="a-indicator" data-slide-to="2" aria-label="Informação 3"></button>
          </div>
        </div>
        
        <div class="m-about-image-container">
            <img src="img/img-sobrenos.png" alt="Imagem da Loja Física Divina Essência" class="a-about-img">
        </div>
    </div>
</section>

<div class="whats">
    <a href="https://wa.me/5511913119603" target="_blank">
      <img src="img/wppsemfundo.png" width="70" alt="whatsapp" title="Fale conosco pelo whatsapp">
    </a>
</div>


<div class="o-mini-cart-overlay" id="mini-cart-overlay">
    <div class="o-mini-cart" id="mini-cart">
        
        <div class="m-cart-header">
            <i class="bi bi-bag-fill a-cart-icon"></i>
            <h4 class="a-cart-title">MINHA SACOLA</h4>
            <button class="a-close-btn" id="close-cart-btn" aria-label="Fechar Carrinho">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        
        <div class="m-cart-items-list">
            
            <div class="m-cart-item" style="display: none;">
                <div class="a-item-image">
                    <img src="img/bucha-vegetal-cart.png" alt="Bucha Vegetal">
                </div>
                <div class="a-item-details">
                    <p class="a-item-name">Bucha vegetal</p>
                    <div class="m-item-quantity-control">
                        <button class="a-qty-btn a-qty-btn--minus">-</button>
                        <span class="a-item-qty">1</span>
                        <button class="a-qty-btn a-qty-btn--plus">+</button>
                    </div>
                </div>
                <div class="a-item-price-remove">
                    <p class="a-item-price">R$ 30,00</p>
                    <button class="a-remove-btn"><i class="bi bi-trash"></i></button>
                </div>
            </div>
            
            <div class="m-cart-empty-placeholder">
                <p class="a-empty-message">Sua sacola está vazia.</p>
                <i class="bi bi-bag-x a-empty-icon"></i>
                <a href="#destaques" class="a-btn-start-shopping" onclick="closeMiniCart()">Ver Destaques</a>
            </div>
        </div>
        
        <div class="m-cart-footer" style="display: none;">
            <div class="a-total-row">
                <p class="a-total-label">Total de pedido:</p>
                <p class="a-total-value">R$ 0,00</p>
            </div>
            <div class="m-cart-actions">
                <button class="a-btn-confirm" disabled>Confirmar sacola</button>
                <button class="a-btn-finalizar" disabled>Finalizar pedido</button>
            </div>
        </div>
        
    </div>
</div>
<footer>
    <section class="m-footer-newsletter">
        <div class="a-newsletter-content">
            <p>Receba nossas Novidades</p>
            <div class="m-newsletter-form">
                <input type="email" class="a-input-email" placeholder="DIGITE SEU E-MAIL">
                <button class="a-btn-icon">
                    <i class="bi bi-envelope"></i>
                </button>
            </div>
        </div>
    </section>
    
    <div class="m-footer-info">
        <div class="a-contact-block">
            <h4>Precisa de ajuda?</h4>
            <p>(11) 8736-3735</p>
            <p>Seg à Sex: 8h às 20h</p>
            <p>Sáb: 9h às 20h</p>
            <p class="a-small-text">(Indisponível domingos e feriados nacionais)</p>
            <p class="a-email-link">atendimento@sac.essenciadivinaa.com.br</p>
        </div>
        
        <div class="a-social-block">
            <h4>Redes sociais</h4>
            <div class="m-social-link">
                <i class="bi bi-instagram"></i>
                <a href="#">Divina_essencia</a>
            </div>
            <div class="m-social-link">
                <i class="bi bi-facebook"></i>
                <a href="#">Divina_essencia</a>
            </div>
        </div>
    </div>
    
    <div class="a-copyright">
        <p style="
            color: white; 
            background-color: black;
            text-align: center; 
            margin: 0; 
            padding: 10px 15px; 
            width: 100%;">
            Todos direitos reservados a Isadora Burgos, Isabella Avelina, Lise Fliess e Pedro Almeida - 2025
        </p>
    </div>
</footer>
<script src="./js/script.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>