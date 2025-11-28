<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Pedido - Divina Essência</title>

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
    {{-- HEADER --}}
    <header class="o-header">
        <div class="o-header__top">
            <div class="a-logo">
                <a href="{{ route('home') }}"> 
                    <img src="{{ asset('img/Logo.png') }}" alt="Divina Essência">
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
                    @auth
                        <i class="a-icon bi bi-person-circle" id="login-icon"></i>
                    @else
                        <i class="a-icon bi bi-box-arrow-in-right" id="login-icon"></i>
                    @endauth

                    <div class="m-user-dropdown" id="user-dropdown-menu">
                        @auth
                            <a href="{{ route('minhaconta') }}" class="a-dropdown-link">Minha conta</a>
                            <a href="{{ route('meuspedidos') }}" class="a-dropdown-link">Meus Pedidos</a>
                            <a href="{{ route('favoritos') }}" class="a-dropdown-link">Meus Favoritos</a>
                            <a href="{{ route('logout') }}" class="a-dropdown-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                        @else
                            <a href="{{ route('login') }}" class="a-dropdown-link">Entrar / Cadastrar</a>
                        @endauth
                    </div>
                </div>
                
                <a href="javascript:void(0);" class="a-icon-link" id="cart-icon-link">
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
                <li><a href="{{ route('categorias.sabonetes') }}" class="a-link">SABONETES</a></li>
                <li><a href="{{ route('categorias.aromatizantes') }}" class="a-link">AROMATIZANTES</a></li>
                <li><a href="{{ route('categorias.velas') }}" class="a-link">VELAS</a></li>
                <li><a href="{{ route('categorias.oleos-essenciais') }}" class="a-link">ESSÊNCIAS</a></li> 
                <li><a href="{{ route('categorias.acessorios') }}" class="a-link">ACESSÓRIOS</a></li>
                <li><a href="{{ route('categorias.kits') }}" class="a-link">KITS</a></li>
            </ul>
        </nav>
    </header>

    {{-- CONTEÚDO DA PÁGINA (DETALHES DO PEDIDO) --}}
    <main class="container-principal my-5">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Home</a> / <a href="{{ route('meuspedidos') }}">Meus Pedidos</a> / <span>Detalhes</span>
        </div>

        <h1 class="a-section-title o-page-title">< DETALHES DO PEDIDO</h1>

        <div class="o-user-dashboard-layout">
            
            {{-- SIDEBAR --}}
            <nav class="o-sidebar-menu">
                <ul class="m-account-links">
                    <li class="a-link-item"><a href="{{ route('minhaconta') }}" class="a-link">Minha conta</a></li>
                    <li class="a-link-item"><a href="{{ route('meuspedidos') }}" class="a-link a-link--active">Meus Pedidos</a></li>
                    <li class="a-link-item"><a href="{{ route('favoritos') }}" class="a-link">Meus Favoritos</a></li>
                    <li class="a-link-item">
                        <a href="{{ route('logout') }}" class="a-link a-link--logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                    </li>
                </ul>
            </nav>

            <div class="o-page-content">
                {{-- ⚠️ Você deve passar o objeto $pedido (ou $order) para esta view do Controller --}}
                @if(isset($pedido))
                    <div class="row g-4">
                        
                        {{-- Status e Resumo --}}
                        <div class="col-12">
                            <div class="card p-4 shadow-sm">
                                <h4 class="mb-3">Pedido #{{ $pedido->id }} 
                                    <span class="badge 
                                        @if($pedido->status == 'Pago') bg-success 
                                        @elseif($pedido->status == 'Pendente') bg-warning text-dark
                                        @elseif($pedido->status == 'Enviado') bg-info text-dark
                                        @else bg-secondary
                                        @endif
                                        float-end">
                                        {{ $pedido->status }}
                                    </span>
                                </h4>
                                <p>Data: {{ $pedido->created_at->format('d/m/Y H:i') }} | Total: **R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}**</p>
                                @if($pedido->status === 'Pendente' && $pedido->metodo_pagamento === 'PIX')
                                    <div class="alert alert-warning mt-2">
                                        Pagamento via **PIX pendente**. Finalize o pagamento para processar o envio.
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        {{-- Endereço e Dados Pessoais --}}
                        <div class="col-md-6">
                            <div class="card p-4 shadow-sm h-100">
                                <h5><i class="bi bi-geo-alt-fill"></i> Endereço de Entrega</h5>
                                <hr>
                                <p class="mb-1">**{{ $pedido->endereco_entrega->nome_completo ?? 'Nome do Cliente' }}**</p>
                                <p class="mb-1">{{ $pedido->endereco_entrega->rua }}, {{ $pedido->endereco_entrega->numero }}</p>
                                <p class="mb-1">{{ $pedido->endereco_entrega->complemento }}</p>
                                <p class="mb-1">{{ $pedido->endereco_entrega->bairro }} - {{ $pedido->endereco_entrega->cidade }}</p>
                                <p class="mb-1">CEP: {{ $pedido->endereco_entrega->cep }}</p>
                            </div>
                        </div>

                        {{-- Pagamento e Frete --}}
                        <div class="col-md-6">
                            <div class="card p-4 shadow-sm h-100">
                                <h5><i class="bi bi-credit-card-2-back-fill"></i> Informações Financeiras</h5>
                                <hr>
                                <p>Método: **{{ $pedido->metodo_pagamento }}**</p>
                                <p>Subtotal: R$ {{ number_format($pedido->subtotal, 2, ',', '.') }}</p>
                                <p class="text-primary">Frete: R$ {{ number_format($pedido->valor_frete, 2, ',', '.') }}</p>
                                <h6 class="mt-2">Total Final: <strong class="text-success">R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</strong></h6>
                            </div>
                        </div>

                        {{-- Lista de Itens --}}
                        <div class="col-12">
                            <div class="card p-4 shadow-sm">
                                <h5><i class="bi bi-box"></i> Itens do Pedido</h5>
                                <hr>
                                <ul class="list-group list-group-flush">
                                    {{-- Loop pelos itens do pedido --}}
                                    @foreach($pedido->itens as $item)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-0 fw-bold">{{ $item->produto->nome }}</p>
                                                <small class="text-muted">Qtde: {{ $item->quantidade }} x R$ {{ number_format($item->preco_unitario, 2, ',', '.') }}</small>
                                            </div>
                                            <span class="fw-bold">R$ {{ number_format($item->subtotal, 2, ',', '.') }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-12 text-center mt-3">
                            <a href="{{ route('meuspedidos') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Voltar para Meus Pedidos
                            </a>
                        </div>
                    </div>
                @else
                    <div class="alert alert-danger text-center">
                        Detalhes do pedido não encontrados.
                    </div>
                @endif
            </div>
        </div>
    </main>
    {{-- Fim do Conteúdo Principal --}}

    <div class="whats">
        <a href="https://wa.me/5511913119603" target="_blank">
          <img src="{{ asset('img/wppsemfundo.png') }}" width="70" alt="whatsapp" title="Fale conosco pelo whatsapp">
        </a>
    </div>

    {{-- MINI CARRINHO --}}
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
                <div class="m-cart-empty-placeholder" id="cart-empty-placeholder">
                    <p class="a-empty-message">Sua sacola está vazia.</p>
                    <i class="bi bi-bag-x a-empty-icon"></i>
                    <a href="{{ route('home') }}" class="a-btn-start-shopping" onclick="closeMiniCart()">Ver Destaques</a>
                </div>
            </div>
            <div class="m-cart-footer" id="cart-footer" style="display: none;">
                <div class="a-total-row">
                    <p class="a-total-label">Total de pedido:</p>
                    <p class="a-total-value" id="mini-cart-total-value">R$ 0,00</p>
                </div>
                <div class="m-cart-actions">
                    <a href="{{ route('carrinho.index') }}" id="btn-edit-cart" class="a-btn-confirm">Confirmar sacola (Editar)</a>
                    <a href="{{ route('checkout.user_data') }}" id="btn-checkout" class="a-btn-finalizar">Finalizar pedido</a>
                </div>
            </div>
        </div>
    </div>
    
    {{-- FOOTER --}}
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

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>