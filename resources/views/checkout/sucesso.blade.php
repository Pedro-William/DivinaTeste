<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido Concluído! - Divina Essência</title>

    <link rel="stylesheet" href="{{ asset('css/app.css')}}"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    {{-- SEU HEADER --}}
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

    {{-- CONTEÚDO PRINCIPAL (CHECKOUT - SUCESSO) --}}
    <main>
        <div class="container-principal my-5">
            <h1 class="a-section-title o-page-title">< PEDIDO CONCLUÍDO!</h1>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-lg p-5 text-center bg-light border-success">
                        <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                        <h2 class="mt-3 text-success">Obrigado pela sua compra!</h2>
                        
                        {{-- ⚠️ Você deve passar a variável $pedido (ou $order) do Controller para esta view --}}
                        @if(isset($pedido))
                            <p class="lead">Seu pedido **#{{ $pedido->id }}** foi processado com sucesso.</p>
                            <p>Um e-mail de confirmação foi enviado para **{{ $pedido->email_cliente }}** com os detalhes do seu pedido e o acompanhamento.</p>
                            
                            <hr class="my-4">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <h5 class="text-primary">Valor Total</h5>
                                    <p class="fs-4 text-success">R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <h5 class="text-primary">Método de Pagamento</h5>
                                    <p class="fs-4">{{ $pedido->metodo_pagamento }}</p>
                                </div>
                            </div>
                            
                            {{-- Se o pagamento for PIX, você pode exibir o QR code/chave aqui --}}
                            @if($pedido->metodo_pagamento === 'PIX')
                                <div class="alert alert-warning mt-3">
                                    <p class="fw-bold">Pagamento via PIX</p>
                                    <p>Use o QR Code ou a chave abaixo para finalizar o pagamento em até 1 hora. **Seu pedido será confirmado após a compensação.**</p>
                                    {{-- Simulação de QR Code --}}
                                    <div class="bg-white p-3 d-inline-block border">
                                        

[Image of QR Code]

                                    </div>
                                    <p class="mt-2 small text-muted">Chave Pix: {{ $pedido->chave_pix }}</p>
                                </div>
                            @endif

                        @else
                            {{-- Mensagem de fallback caso a variável do pedido não seja passada --}}
                            <p class="lead">Seu pedido foi processado. Um e-mail de confirmação com os detalhes foi enviado.</p>
                        @endif

                        <hr class="my-4">

                        <div class="d-grid gap-2 d-md-block">
                            <a href="{{ route('meuspedidos') }}" class="btn btn-primary a-btn-finalizar btn-lg me-md-2">
                                <i class="bi bi-list-check"></i> Acompanhar Pedido
                            </a>
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg">
                                <i class="bi bi-house"></i> Voltar para Home
                            </a>
                        </div>
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