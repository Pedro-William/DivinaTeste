<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - 1. Identificação - Divina Essência</title>

    <link rel="stylesheet" href="{{ asset('css/app.css')}}"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    {{-- SEU HEADER --}}
    <header class="o-header">
        <div class="o-header__top">
            <div class="a-logo">
                <a href="/home">
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
                    <i class="a-icon bi bi-box-arrow-in-right" id="login-icon"></i>
    
                    <div class="m-user-dropdown" id="user-dropdown-menu">
                        <a href="/minha conta" class="a-dropdown-link">Minha conta</a>
                        <a href="/meuspedidos" class="a-dropdown-link">Meus Pedidos</a>
                        <a href="/sair" class="a-dropdown-link">Sair</a>
                    </div>
                </div>
                
                <a href="{{ route('carrinho.index') }}" class="a-icon-link" id="cart-icon-link">
                    <i class="a-icon bi bi-bag"></i>
                </a>
                
                <a href="meusfavoritos.html" class="a-icon-link">
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

    {{-- CONTEÚDO PRINCIPAL (CHECKOUT - ETAPA 1) --}}
    <main>
        <div class="container-principal my-5">
            <div class="breadcrumb">
                <a href="{{ route('carrinho.index') }}">Sacola</a> / <span>Identificação</span>
            </div>

            <h1 class="a-section-title o-page-title">< CHECKOUT - 1. IDENTIFICAÇÃO</h1>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm p-4">
                        
                        @if(session('erro'))
                            <div class="alert alert-danger">{{ session('erro') }}</div>
                        @endif
                        
                        {{-- O controller deve redirecionar automaticamente se o usuário estiver Auth::check() --}}
                        {{-- Este bloco é principalmente para o "Convidado" --}}
                        @guest
                            <p class="lead text-center">Informe seus dados para continuar como convidado ou faça login.</p>
                            <hr>

                            <form action="{{ route('checkout.store_user') }}" method="POST">
                                @csrf
                                
                                <div class="mb-3">
                                    <label for="email" class="form-label">E-mail *</label>
                                    <input type="email" class="form-control a-input" id="email" name="email" required 
                                           value="{{ old('email', session('checkout_user_data.email')) }}" 
                                           placeholder="seu@email.com">
                                    @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome Completo *</label>
                                    <input type="text" class="form-control a-input" id="nome" name="nome" required 
                                           value="{{ old('nome', session('checkout_user_data.nome')) }}"
                                           placeholder="Seu Nome e Sobrenome">
                                    @error('nome') <div class="text-danger small">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="telefone" class="form-label">Telefone (opcional)</label>
                                    <input type="text" class="form-control a-input" id="telefone" name="telefone" 
                                           value="{{ old('telefone', session('checkout_user_data.telefone')) }}"
                                           placeholder="(99) 99999-9999">
                                    @error('telefone') <div class="text-danger small">{{ $message }}</div> @enderror
                                </div>
                                
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn a-btn-finalizar btn-lg">Continuar para o Endereço</button>
                                    {{-- Ajuste a rota de login se necessário --}}
                                    <a href="{{ route('login') }}" class="btn btn-outline-secondary">Já sou cliente, fazer Login</a>
                                </div>
                            </form>
                        @else
                            {{-- Mensagem caso o controller falhe em redirecionar e o usuário logado chegue aqui --}}
                            <p class="lead text-center text-success">
                                Você está logado como **{{ Auth::user()->name ?? 'Cliente' }}**. 
                                <br>Seus dados de identificação serão usados.
                            </p>
                            <div class="d-grid">
                                <a href="{{ route('checkout.address_data') }}" class="btn a-btn-finalizar btn-lg">Continuar para o Endereço</a>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- SEU MINI-CART OVERLAY --}}
    <div class="o-mini-cart-overlay" id="mini-cart-overlay">
        {{-- ... código do mini-cart overlay ... --}}
    </div>
    
    {{-- SEU FOOTER --}}
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
    <script src="{{ asset('js/script.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>