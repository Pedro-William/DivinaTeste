<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecobag - Divina Essência</title>
    
    {{-- 🔑 CHAVE PARA O AJAX DO LARAVEL (CSRF Token) --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- As rotas aqui devem ser ajustadas para refletir a estrutura do seu projeto. 
        Recomenda-se usar asset() e as rotas nomeadas do Laravel. --}}
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('css/atomic/atoms/buttons.css')}}">
    <link rel="stylesheet" href="{{ asset('css/atomic/molecules/search.css')}}">
    <link rel="stylesheet" href="{{ asset('css/atomic/molecules/user-options.css')}}">
    <link rel="stylesheet" href="{{ asset('css/atomic/molecules/quantity-selector.css')}}"> 
    <link rel="stylesheet" href="{{ asset('css/atomic/molecules/breadcrumb.css')}}"> 
    <link rel="stylesheet" href="{{ asset('css/atomic/molecules/product-card.css')}}"> 
    <link rel="stylesheet" href="{{ asset('css/atomic/organisms/header.css')}}">
    <link rel="stylesheet" href="{{ asset('css/atomic/organisms/footer.css')}}">
    <link rel="stylesheet" href="{{ asset('css/atomic/organisms/layoutprodutos.css')}}"> 
    <link rel="stylesheet" href="{{ asset('css/atomic/organisms/productpage.css')}}"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

    <header class="o-header">
        <div class="o-header__top">
            <div class="a-logo">
                {{-- ✅ Usando asset() para imagem e route() para rota --}}
                <a href="/home">
                    <img src="/img/Logo.png" alt="Divina Essência">
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
                        {{-- ✅ Usando route() --}}
                        <a href="/minhaconta" class="a-dropdown-link">Minha conta</a>
                        <a href="/meuspedidos" class="a-dropdown-link">Meus Pedidos</a>
                        <a href="/logout" class="a-dropdown-link">Sair</a>
                    </div>
                </div>
                
                
                <a href="{{ route('carrinho.index') }}" class="a-icon-link" id="cart-icon-link">
                    <i class="a-icon bi bi-bag"></i>
                </a>
                
                
                <a href="{{ route('favoritos') }}" class="a-icon-link">
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
<main class="container-principal">
    <section class="o-product-detail">
        
        <div class="m-product-gallery">
            <img src="/img/acessorio-ecobag.png" alt="Ecobag com embalagem Divina Essência" class="a-main-product-image">
        </div>

        <div class="m-product-info">
            <h1 class="a-product-title">Ecobag</h1>
            <p class="a-product-price">R$ 60,00</p>
            
            <div class="o-product-description">
                <h2 class="a-description-title">Benefícios</h2>
                <ul class="m-benefits-list">
                    <li>Confeccionada em 100% Algodão Cru, totalmente natural.</li>
                    <li>Reutilizável e resistente a alternativa perfeita para reduzir o uso de plástico.</li>
                    <li>Tamanho ideal para o seu dia a dia, compras ou para montar kits de presente.</li>
                    <li>Design minimalista e elegante com a marca Divina Essência.</li>
                    <li>Fácil de lavar e dobrar, ideal para levar sempre com você.</li>
                </ul>
        <p class="a-product-summary">Leve seus produtos Divina Essência, livros e compras com consciência ambiental e muito estilo. Nossa Ecobag é mais do que um acessório; é um passo simples e elegante em direção a um consumo mais sustentável e alinhado com o seu bem-estar e o do planeta.</p>
            </div>
            <div class="m-buy-options">
    
                <div class="m-quantity-selector">
                    <button class="a-qty-btn a-qty-btn--minus" data-action="decrement">-</button>
                    <input type="number" value="1" min="1" class="a-qty-input" id="product-quantity-input">
                    <button class="a-qty-btn a-qty-btn--plus" data-action="increment">+</button>
                </div>
                
                {{-- 🛑 Ponto de Ação: Adicionado ID e DATA-ID para o JS --}}
                <button class="a-btn-buy" id="btn-add-to-cart" data-product-id="5">
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
            <a href="/esponja vegetal" class="a-btn-add">Adicionar</a> 
                 </div>
            <div class="m-product-card"> 
                <img src="../img/aroma-citronela.png" alt="Aromatizador Citronela" class="a-product-img"> 
                <h4 class="a-product-name">Citronela</h4> 
                <p class="a-product-size">250ml</p> 
                <h3 class="a-product-price">R$ 32,40</h3> 
            <a href="./citronela" class="a-btn-add">Adicionar</a> 
            </div>
            <div class="m-product-card"> 
                <img src="../img/vela-bluetansy.png" alt="Vela Blue Tansy" class="a-product-img">
                 <h4 class="a-product-name">Blue Tansy</h4>
                  <p class="a-product-size">140g</p> 
                  <h3 class="a-product-price">R$ 23,40</h3> 
            <a href="/blue tansy" class="a-btn-add">Adicionar</a> 
                </div>
            <div class="m-product-card">
                 <img src="../img/sbnt-aveiamel.png" alt="Sabonete Argila Rosa e Lavanda 2" class="a-product-img">
                  <h4 class="a-product-name">Sabonete Aveia e Mel</h4> 
                  <p class="a-product-size">110g</p> 
                  <h3 class="a-product-price">R$ 38,00</h3> 
            <a href="/Sabonete Aveia e Mel" class="a-btn-add">Adicionar</a> 
                 </div>
            <div class="m-product-card"> 
                <img src="../img/acessorio-ecobag.png" alt="Bucha Vegetal 2" class="a-product-img"> 
                <h4 class="a-product-name">Ecobag</h4> 
                <p class="a-product-size">...</p>
                 <h3 class="a-product-price">R$ 60,00</h3> 
            <a href="/ecobag" class="a-btn-add">Adicionar</a> 
                </div>
            <div class="m-product-card"> 
                <img src="../img/aroma-citronela.png" alt="Aromatizador Citronela 2" class="a-product-img">
                 <h4 class="a-product-name">Citronela </h4> 
                 <p class="a-product-size">250ml</p> 
                 <h3 class="a-product-price">R$ 32,40</h3> 
            <a href="/citronela" class="a-btn-add">Adicionar</a> 
                 </div>
            <div class="m-product-card"> 
                <img src="../img/vela-bluetansy.png" alt="Vela Blue Tansy 2" class="a-product-img">
                 <h4 class="a-product-name">Blue Tansy </h4> 
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
          <img src="/img/wppsemfundo.png" width="70" alt="whatsapp" title="Fale conosco pelo whatsapp">
        </a>
    </div>


    {{-- MINI CARRINHO (Omitido para brevidade, mas está na view original) --}}
    <div class="o-mini-cart-overlay" id="mini-cart-overlay">
        </div>
    
<footer>
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

{{-- 🔑 FORMULÁRIO OCULTO PARA LOGOUT (Padrão Laravel) --}}
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

{{-- Lógica de Carrinho (DEVE ESTAR EM resources/js/script.js) --}}

<script src="/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>