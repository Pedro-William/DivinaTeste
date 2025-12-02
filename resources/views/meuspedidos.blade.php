<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Pedidos - Divina Essência</title>
    
    {{-- 🔑 CHAVE PARA O AJAX DO LARAVEL (CSRF Token) --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}"> 
    <link rel="stylesheet" href="{{ asset('css/atomic/atoms/form-elements.css')}}"> 
    <link rel="stylesheet" href="{{ asset('css/atomic/molecules/inputform.css')}}"> 
    <link rel="stylesheet" href="{{ asset('css/atomic/organisms/baselogin.css')}}"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<header class="o-header">
    <div class="o-header__top">
        <div class="a-logo">
            {{-- ✅ Rota 'home' --}}
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
                    {{-- ✅ Rotas de Usuário (Protegidas) --}}
                    <a href="/minha-conta" class="a-dropdown-link">Minha conta</a>
                    <a href="/meus-pedidos" class="a-dropdown-link">Meus Pedidos</a>
                    
                    {{-- ✅ Logoff (Formulário é o padrão Laravel, ou um link que aciona um POST via JS) --}}
                    <a href="{{ route('logout') }}" class="a-dropdown-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
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
            {{-- ✅ Rotas de Categoria --}}
            <li><a href="/sabonetes" class="a-link">SABONETES</a></li>
            <li><a href="/aromatizantes" class="a-link">AROMATIZANTES</a></li>
            <li><a href="/velas" class="a-link">VELAS</a></li>
            {{-- ✅ Rota ajustada para hífens --}}
            <li><a href="/oleos essenciais" class="a-link">ESSÊNCIAS</a></li> 
            <li><a href="/acessorios" class="a-link">ACESSÓRIOS</a></li>
            <li><a href="/kits" class="a-link">KITS</a></li>
        </ul>
    </nav>
</header>

{{-- 🧩 ONDE O CONTEÚDO DA PÁGINA SERÁ INSERIDO (EX: Minha Conta, Meus Pedidos) --}}
<div class="container-principal">
    {{-- Aqui você usaria o @yield('content') se este fosse seu layout principal --}}
    
    {{-- Conteúdo atual da view 'Meus Pedidos' --}}
    <div class="breadcrumb">
        <a href="/home">Home</a> / <span>Meus Pedidos</span>
    </div>

    <h1 class="a-section-title o-page-title">< MEUS PEDIDOS</h1>

    <div class="o-user-dashboard-layout">
        
        <nav class="o-sidebar-menu">
            <ul class="m-account-links">
                {{-- ✅ Links do Sidebar Corrigidos --}}
              <li class="a-link-item"><a href="/minha-conta" class="a-link a-link--active">Minha conta</a></li>
                <li class="a-link-item"><a href="/meus-pedidos" class="a-link">Meus Pedidos</a></li>
                <li class="a-link-item"><a href="/favoritos" class="a-link">Meus Favoritos</a></li>
                
                <li class="a-link-item">
                    <a href="{{ route('logout') }}" class="a-link a-link--logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                </li>
            </ul>
        </nav>

        <div class="o-page-content">
            <section class="o-order-list">
                <div class="a-empty-state-message a-empty-state-message--full-width">
                    <p>Você não possui pedidos realizados.</p>
                </div>
            </section>
        </div>
    </div>
    {{-- Fim do conteúdo da view 'Meus Pedidos' --}}
    
</div>
{{-- Fim do container-principal --}}


<div class="whats">
    <a href="https://wa.me/5511913119603" target="_blank">
      <img src="img/wppsemfundo.png" width="70" alt="whatsapp" title="Fale conosco pelo whatsapp">
    </a>
</div>


{{-- 🛒 MINI CARRINHO: Adicionado IDs e classes para o JS manipular --}}
<div class="o-mini-cart-overlay" id="mini-cart-overlay">
    <div class="o-mini-cart" id="mini-cart">
        
        <div class="m-cart-header">
            <i class="bi bi-bag-fill a-cart-icon"></i>
            <h4 class="a-cart-title">MINHA SACOLA</h4>
            <button class="a-close-btn" id="close-cart-btn" aria-label="Fechar Carrinho">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        
        <div class="m-cart-items-list" id="cart-items-list">
            {{-- ⚠️ ESTE CONTEÚDO SERÁ EXCLUÍDO E SUBSTITUÍDO PELO JAVASCRIPT --}}
            {{-- Mantive o placeholder para estrutura, mas o JS o preencherá --}}
            <div class="m-cart-item" style="display: none;" id="cart-item-template">
                <div class="a-item-image">
                    <img src="" alt="" data-src="img/bucha-vegetal-cart.png">
                </div>
                <div class="a-item-details">
                    <p class="a-item-name"></p>
                    <div class="m-item-quantity-control">
                        <button class="a-qty-btn a-qty-btn--minus" data-action="minus">-</button>
                        <span class="a-item-qty"></span>
                        <button class="a-qty-btn a-qty-btn--plus" data-action="plus">+</button>
                    </div>
                </div>
                <div class="a-item-price-remove">
                    <p class="a-item-price"></p>
                    <button class="a-remove-btn" data-id=""><i class="bi bi-trash"></i></button>
                </div>
            </div>
            
            <div class="m-cart-empty-placeholder" id="cart-empty-placeholder">
                <p class="a-empty-message">Sua sacola está vazia.</p>
                <i class="bi bi-bag-x a-empty-icon"></i>
                <a href="/home" class="a-btn-start-shopping" onclick="closeMiniCart()">Ver Destaques</a>
            </div>
        </div>
        
        <div class="m-cart-footer" id="cart-footer" style="display: none;">
            <div class="a-total-row">
                <p class="a-total-label">Total de pedido:</p>
                <p class="a-total-value" id="mini-cart-total-value">R$ 0,00</p>
            </div>
            <div class="m-cart-actions">
                {{-- ✅ BOTÕES AGORA SÃO LINKS/FORMULÁRIOS ACIONADOS POR JS. Aqui é o placeholder. --}}
                <a href="{{ route('carrinho.index') }}" id="btn-edit-cart" class="a-btn-confirm">Confirmar sacola (Editar)</a>
                <a href="{{ route('checkout.user_data') }}" id="btn-checkout" class="a-btn-finalizar">Finalizar pedido</a>
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

{{-- 🔑 FORMULÁRIO OCULTO PARA LOGOUT (Padrão Laravel) --}}
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<script src="js/script.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>