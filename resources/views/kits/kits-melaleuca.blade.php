<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kit Melaleuca - Divina Essência</title>

    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('../css/atomic/atoms/buttons.css')}}">
    <link rel="stylesheet" href="{{ asset('../css/atomic/molecules/search.css')}}">
    <link rel="stylesheet" href="{{ asset('../css/atomic/molecules/user-options.css')}}">
    <link rel="stylesheet" href="{{ asset('../css/atomic/molecules/quantity-selector.css')}}"> 
    <link rel="stylesheet" href="{{ asset('../css/atomic/molecules/breadcrumb.css')}}">
    <link rel="stylesheet" href="{{ asset('../css/atomic/molecules/product-card.css')}}"> 
    <link rel="stylesheet" href="{{ asset('../css/atomic/organisms/header.css')}}">
    <link rel="stylesheet" href="{{ asset('../css/atomic/organisms/footer.css')}}">
    <link rel="stylesheet" href="{{ asset('../css/atomic/organisms/layoutprodutos.css')}}">
    <link rel="stylesheet" href="{{ asset('../css/atomic/organisms/productpage.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
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
               
                
                <a href="/carrinho" class="a-icon-link" id="cart-icon-link">
                    <i class="a-icon bi bi-bag"></i>
                </a>
                
                
                <a href="/favoritos" class="a-icon-link">
                    <i class="a-icon bi bi-heart"></i>
                </a>
                 <div class="m-user-menu-trigger">
                    <i class="a-icon bi bi-box-arrow-in-right" id="login-icon"></i>
                    <div class="m-user-dropdown" id="user-dropdown-menu">
                         <a href="/minha-conta" class="a-dropdown-link">Minha conta</a>
                        <a href="/meus-pedidos" class="a-dropdown-link">Meus Pedidos</a>
                        <a href="/sair" class="a-dropdown-link">Sair</a>
                    </div>
                </div>
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
<main class="container-principal">
    <section class="o-product-detail">
        
        <div class="m-product-gallery">
            <img src="../img/kits-melaleuca.png" alt="Bucha Vegetal com embalagem Divina Essência" class="a-main-product-image">
        </div>

        <div class="m-product-info">
            <h1 class="a-product-title">Kit Melaleuca</h1>
            <p class="a-product-price">R$ 130,00</p>
            
     
<div class="o-product-description">
    <h2 class="a-description-title">O Grande Purificador e Antisséptico</h2>
    <ul class="m-benefits-list">
        <li>Propriedades antifúngicas, antibacterianas e antivirais extremamente eficazes.</li>
        <li>Ideal para o tratamento de acne, micoses, caspa e verrugas.</li>
        <li>Poderoso aliado na limpeza de pele e no combate à oleosidade excessiva.</li>
        <li>Usado para purificar o ar e superfícies, combatendo microrganismos.</li>
    </ul>
    <p class="a-product-summary">A Melaleuca é a escolha número um para a higiene e purificação. Seu aroma herbal forte é a garantia de um tratamento natural para infecções de pele e cabelo, mantendo seu corpo e seu ambiente livres de impurezas.</p>
</div>

            <div class="m-buy-options">
    
                <div class="m-quantity-selector">
                    <button class="a-qty-btn a-qty-btn--minus" data-action="decrement">-</button>
                    <input type="number" value="1" min="1" class="a-qty-input" id="product-quantity-input">
                    <button class="a-qty-btn a-qty-btn--plus" data-action="increment">+</button>
                </div>
                
                <button class="a-btn-buy" id="btn-add-to-cart" data-product-id="35">
                    Comprar
                </button>  
            </div>
        </div>
    </section>
    
    </main>
    
   <section class="o-product-grid" id="novidades">
  <h2 class="a-section-title">NOVIDADES</h2>
  
    <div class="m-carousel-view" id="carousel-novidades">

        <button class="a-carousel-control a-carousel-control--prev" aria-label="Anterior">
            <i class="bi bi-chevron-left"></i>
        </button>

        <div class="m-product-row">
    <div class="m-product-card">
        <img src="../img/sbnt-argilarosalavanda.png" alt="Sabonete Argila Rosa e Lavanda" class="a-product-img">
        <h4 class="a-product-name">Sabonete Argila Rosa e Lavanda</h4>
        <p class="a-product-size">110g</p>
        <h3 class="a-product-price">R$ 38,00</h3>
        <a href="/argila rosa e lavanda" class="a-btn-add">Adicionar</a>
    </div>

    <div class="m-product-card">
        <img src="../img/acessorio-buchavegetal.png" alt="Bucha Vegetal" class="a-product-img">
        <h4 class="a-product-name">Bucha Vegetal</h4>
        <p class="a-product-size">...</p>
        <h3 class="a-product-price">R$ 19,20</h3>
        <a href="/bucha vegetal" class="a-btn-add">Adicionar</a>
    </div>

    <div class="m-product-card">
        <img src="../img/aroma-citronela.png" alt="Aromatizador Citronela" class="a-product-img">
        <h4 class="a-product-name">Citronela</h4>
        <p class="a-product-size">250ml</p>
        <h3 class="a-product-price">R$ 32,40</h3>
        <a href="/citronela" class="a-btn-add">Adicionar</a>
    </div>

    <div class="m-product-card">
        <img src="../img/vela-bluetansy.png" alt="Vela Blue Tansy" class="a-product-img">
        <h4 class="a-product-name">Blue Tansy</h4>
        <p class="a-product-size">140g</p>
        <h3 class="a-product-price">R$ 23,40</h3>
        <a href="/blue tansy" class="a-btn-add">Adicionar</a>
    </div>

    <div class="m-product-card">
        <img src="../img/sbnt-aveiamel.png" alt="Sabonete Aveia e Mel" class="a-product-img">
        <h4 class="a-product-name">Sabonete Aveia e Mel</h4>
        <p class="a-product-size">110g</p>
        <h3 class="a-product-price">R$ 38,00</h3>
        <a href="/Sabonete aveia e mel" class="a-btn-add">Adicionar</a>
    </div>

    <div class="m-product-card">
        <img src="../img/acessorio-ecobag.png" alt="Ecobag" class="a-product-img">
        <h4 class="a-product-name">Ecobag</h4>
        <p class="a-product-size">...</p>
        <h3 class="a-product-price">R$ 60,00</h3>
        <a href="/ecobag" class="a-btn-add">Adicionar</a>
    </div>

    <div class="m-product-card">
        <img src="../img/aroma-citronela.png" alt="Aromatizador Citronela 2" class="a-product-img">
        <h4 class="a-product-name">Citronela</h4>
        <p class="a-product-size">250ml</p>
        <h3 class="a-product-price">R$ 32,40</h3>
        <a href="/citronela" class="a-btn-add">Adicionar</a>
    </div>

    <div class="m-product-card">
        <img src="../img/vela-bluetansy.png" alt="Vela Blue Tansy 2" class="a-product-img">
        <h4 class="a-product-name">Blue Tansy</h4>
        <p class="a-product-size">140g</p>
        <h3 class="a-product-price">R$ 23,40</h3>
        <a href="/blue tansy" class="a-btn-add">Adicionar</a>
    </div>
</div>

        <button class="a-carousel-control a-carousel-control--next" aria-label="Próximo">
            <i class="bi bi-chevron-right"></i>
        </button>

        <div class="m-carousel-indicators" aria-label="Navegação do carrossel Novidades">
            </div>

    </div>
</section>
<div class="whats">
    <a href="https://wa.me/5511913119603" target="_blank">
      <img src="../img/wppsemfundo.png" width="70" alt="whatsapp" title="Fale conosco pelo whatsapp">
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
                    <img src="../img/bucha-vegetal-cart.png" alt="Bucha Vegetal">
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
<script src="../js/script.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
