<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - 2. Endereço - Divina Essência</title>

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
                        <a href="{{ route('meuspedidos') }}" class="a-dropdown-link">Meus Pedidos</a>
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

    {{-- CONTEÚDO PRINCIPAL (CHECKOUT - ETAPA 2) --}}
    <main>
        <div class="container-principal my-5">
            <div class="breadcrumb">
                <a href="{{ route('carrinho.index') }}">Sacola</a> / <a href="{{ route('checkout.user_data') }}">Identificação</a> / <span>Endereço</span>
            </div>

            <h1 class="a-section-title o-page-title">< CHECKOUT - 2. ENDEREÇO</h1>

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card shadow-sm p-4">
                        
                        @if(session('erro'))
                            <div class="alert alert-danger">{{ session('erro') }}</div>
                        @endif
                        
                        {{-- Formulário de Endereço --}}
                        <form action="{{ route('checkout.store_address') }}" method="POST">
                            @csrf
                            
                            {{-- 🧭 Se o usuário estiver logado, aqui ele poderia selecionar um endereço salvo. --}}
                            @auth
                            {{-- Exemplo: Se você tiver a variável $enderecos definida no controller --}}
                                @if(isset($enderecos) && $enderecos->count() > 0)
                                    <div class="alert alert-info">
                                        Você está logado. <a href="#">Clique aqui para usar um endereço salvo.</a>
                                    </div>
                                @endif
                            @endauth
                            
                            <h5 class="mb-3">Preencha o Endereço de Entrega</h5>
                            <div class="row g-3">
                                
                                <div class="col-md-4">
                                    <label for="cep" class="form-label">CEP *</label>
                                    <input type="text" class="form-control a-input" id="cep" name="cep" required 
                                           value="{{ old('cep', session('checkout_address.cep')) }}" placeholder="00000-000">
                                    @error('cep') <div class="text-danger small">{{ $message }}</div> @enderror
                                </div>
                                
                                <div class="col-md-8">
                                    <label for="rua" class="form-label">Rua/Avenida *</label>
                                    <input type="text" class="form-control a-input" id="rua" name="rua" required 
                                           value="{{ old('rua', session('checkout_address.rua')) }}" placeholder="Nome da Rua/Avenida">
                                    @error('rua') <div class="text-danger small">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="numero" class="form-label">Número *</label>
                                    <input type="text" class="form-control a-input" id="numero" name="numero" required 
                                           value="{{ old('numero', session('checkout_address.numero')) }}" placeholder="123">
                                    @error('numero') <div class="text-danger small">{{ $message }}</div> @enderror
                                </div>
                                
                                <div class="col-md-9">
                                    <label for="complemento" class="form-label">Complemento (Opcional)</label>
                                    <input type="text" class="form-control a-input" id="complemento" name="complemento" 
                                           value="{{ old('complemento', session('checkout_address.complemento')) }}" placeholder="Apto, Bloco, etc.">
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="bairro" class="form-label">Bairro *</label>
                                    <input type="text" class="form-control a-input" id="bairro" name="bairro" required 
                                           value="{{ old('bairro', session('checkout_address.bairro')) }}" placeholder="Bairro">
                                    @error('bairro') <div class="text-danger small">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="cidade" class="form-label">Cidade *</label>
                                    <input type="text" class="form-control a-input" id="cidade" name="cidade" required 
                                           value="{{ old('cidade', session('checkout_address.cidade')) }}" placeholder="Cidade">
                                    @error('cidade') <div class="text-danger small">{{ $message }}</div> @enderror
                                </div>
                                
                            </div>

                            <div class="mt-4 d-grid gap-2">
                                <button type="submit" class="btn a-btn-finalizar btn-lg">Continuar para o Pagamento</button>
                                <a href="{{ route('checkout.user_data') }}" class="btn btn-outline-secondary">Voltar (Identificação)</a>
                            </div>
                        </form>
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