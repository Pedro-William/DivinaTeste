<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - 3. Pagamento - Divina Essência</title>

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

    {{-- CONTEÚDO PRINCIPAL (CHECKOUT - ETAPA 3) --}}
    <main>
        <div class="container-principal my-5">
            <div class="breadcrumb">
                <a href="{{ route('carrinho.index') }}">Sacola</a> / <a href="{{ route('checkout.user_data') }}">Identificação</a> / <a href="{{ route('checkout.address_data') }}">Endereço</a> / <span>Pagamento</span>
            </div>

            <h1 class="a-section-title o-page-title">< CHECKOUT - 3. PAGAMENTO</h1>

            <div class="row">
                
                {{-- Resumo do Pedido (Lateral) --}}
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Seu Pedido</span>
                    </h4>
                    <ul class="list-group mb-3">
                        
                        {{-- ⚠️ O valor de $total é simulado para esta view, você deve passá-lo do Controller --}}
                        @php 
                            $total_carrinho = session()->get('total_carrinho', 0.00); 
                            $frete_simulado = 25.00; // Simulação
                            $total_final = $total_carrinho + $frete_simulado;
                        @endphp
                        
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Subtotal Produtos:</span>
                            <strong>R$ {{ number_format($total_carrinho, 2, ',', '.') }}</strong>
                        </li>
                        
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Frete:</span>
                            <strong class="text-primary">R$ {{ number_format($frete_simulado, 2, ',', '.') }}</strong>
                        </li>
                        
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <span>Total Final:</span>
                            <strong class="text-success">R$ {{ number_format($total_final, 2, ',', '.') }}</strong> 
                        </li>
                    </ul>
                </div>

                {{-- Formulário de Pagamento --}}
                <div class="col-md-8 order-md-1">
                    <h5 class="mb-3">Selecione o Método de Pagamento</h5>

                    <form action="{{ route('checkout.processar') }}" method="POST">
                        @csrf
                        
                        @if(session('erro'))
                            <div class="alert alert-danger">{{ session('erro') }}</div>
                        @endif
                        
                        {{-- Opções de Pagamento --}}
                        <div class="my-3">
                            <div class="form-check">
                                <input id="pix" name="metodo_pagamento" type="radio" class="form-check-input" value="pix" required checked>
                                <label class="form-check-label" for="pix">
                                    PIX 
                                    <small class="text-success fw-bold">(5% de desconto já aplicado no total final se escolher)</small>
                                </label>
                            </div>
                            <div class="form-check">
                                <input id="cartao" name="metodo_pagamento" type="radio" class="form-check-input" value="cartao" required>
                                <label class="form-check-label" for="cartao">Cartão de Crédito</label>
                            </div>
                        </div>

                        {{-- Bloco para Detalhes do Cartão (Inicialmente oculto ou simulado) --}}
                        <div id="cartao-details" class="card p-3 mb-3 border-secondary" style="border: 1px dashed #ccc;">
                            <h6>Detalhes do Cartão (Simulação)</h6>
                            <p class="text-muted small">
                                * Em um projeto real, esta seção usaria uma integração segura (Stripe, PagSeguro, etc.)
                            </p>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <input type="text" class="form-control a-input" placeholder="Nome no Cartão" name="card_name" required>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control a-input" placeholder="Número do Cartão" name="card_number" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control a-input" placeholder="Validade (MM/AA)" name="card_expiry" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control a-input" placeholder="CVV" name="card_cvv" required>
                                </div>
                            </div>
                        </div>
                        
                        <hr class="my-4">
                        
                        <div class="d-grid gap-2">
                            <button class="btn a-btn-finalizar btn-lg" type="submit">
                                Finalizar Pedido e Pagar
                            </button>
                            <a href="{{ route('checkout.address_data') }}" class="btn btn-outline-secondary">Voltar (Endereço)</a>
                        </div>
                    </form>
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
    <script>
        // Pequeno script JS para simular o controle de visibilidade dos detalhes do cartão
        document.addEventListener('DOMContentLoaded', function() {
            const pixRadio = document.getElementById('pix');
            const cartaoRadio = document.getElementById('cartao');
            const cartaoDetails = document.getElementById('cartao-details');

            function toggleCardDetails() {
                if (cartaoRadio.checked) {
                    cartaoDetails.style.display = 'block';
                } else {
                    cartaoDetails.style.display = 'none';
                }
            }

            // Inicializa o estado
            toggleCardDetails(); 

            // Adiciona listeners para mudança
            pixRadio.addEventListener('change', toggleCardDetails);
            cartaoRadio.addEventListener('change', toggleCardDetails);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>