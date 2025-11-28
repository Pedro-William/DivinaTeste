<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Sacola - Divina Essência</title>

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

    {{-- CONTEÚDO PRINCIPAL (CARRINHO) --}}
    <main>
        <div class="container-principal my-5">
            
            <div class="breadcrumb">
                <a href="/home">Home</a> / <span>Minha Sacola</span>
            </div>

            <h1 class="a-section-title o-page-title">< MINHA SACOLA</h1>

            @php $carrinho = session()->get('carrinho', []); @endphp

            @if(count($carrinho) > 0)
                
                <div class="row">
                    
                    {{-- Coluna 1: Tabela de Itens (8/12) --}}
                    <div class="col-md-8">
                        
                        {{-- Exibição de Mensagens (Sucesso/Erro) --}}
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if(session('erro'))
                            <div class="alert alert-danger">{{ session('erro') }}</div>
                        @endif

                        <table class="table table-bordered o-cart-table">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 50%;">Produto</th>
                                    <th style="width: 15%;">Preço Unit.</th>
                                    <th style="width: 15%;">Quantidade</th>
                                    <th style="width: 15%;">Subtotal</th>
                                    <th style="width: 5%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carrinho as $id => $detalhes)
                                    <tr data-product-id="{{ $id }}">
                                        
                                        {{-- Nome do Produto --}}
                                        <td>
                                            <div class="d-flex align-items-center">
                                                {{-- Simulação de Imagem: ajuste o caminho asset() se necessário --}}
                                                <img src="{{ asset('img/' . ($detalhes['imagem_nome'] ?? 'default.png')) }}" 
                                                     alt="{{ $detalhes['nome'] }}" 
                                                     style="width: 60px; height: 60px; margin-right: 15px; border-radius: 4px; object-fit: cover;">
                                                <span>{{ $detalhes['nome'] }}</span>
                                            </div>
                                        </td>
                                        
                                        {{-- Preço Unitário --}}
                                        <td>R$ {{ number_format($detalhes['preco'], 2, ',', '.') }}</td>
                                        
                                        {{-- Controle de Quantidade --}}
                                        <td>
                                            <form action="{{ route('carrinho.atualizar', $id) }}" method="POST" class="form-update-qty">
                                                @csrf
                                                {{-- Campo oculto para o método PUT ou PATCH, se quiser ser RESTful, mas POST funciona --}}
                                                {{-- @method('PUT') --}}
                                                <div class="input-group input-group-sm">
                                                    <input type="number" 
                                                           name="quantidade" 
                                                           value="{{ $detalhes['quantidade'] }}" 
                                                           min="1" 
                                                           class="form-control text-center a-input-qty"
                                                           onchange="this.form.submit()">
                                                </div>
                                            </form>
                                        </td>
                                        
                                        {{-- Subtotal do Item --}}
                                        <td>R$ {{ number_format($detalhes['preco'] * $detalhes['quantidade'], 2, ',', '.') }}</td>
                                        
                                        {{-- Botão Remover --}}
                                        <td>
                                            <form action="{{ route('carrinho.remover', $id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja remover este item?')">
                                                @csrf
                                                {{-- Campo oculto para o método DELETE, se quiser ser RESTful --}}
                                                {{-- @method('DELETE') --}}
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Remover">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        <a href="/home" class="btn btn-outline-secondary mt-3">
                            <i class="bi bi-arrow-left"></i> Continuar Comprando
                        </a>
                    </div>

                    {{-- Coluna 2: Resumo do Pedido (4/12) --}}
                    <div class="col-md-4">
                        <div class="card shadow-sm o-order-summary">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Resumo do Pedido</h5>
                            </div>
                            <div class="card-body">
                                
                                <div class="d-flex justify-content-between mb-3">
                                    <span>Subtotal dos Produtos:</span>
                                    <span class="fw-bold">R$ {{ number_format($total, 2, ',', '.') }}</span>
                                </div>
                                
                                <div class="d-flex justify-content-between mb-3">
                                    <span>Frete:</span>
                                    {{-- Frete será calculado no Checkout --}}
                                    <span class="text-muted">A calcular</span>
                                </div>
                                
                                <hr>
                                
                                <div class="d-flex justify-content-between mb-4">
                                    <h4 class="mb-0">Total da Sacola:</h4>
                                    <h4 class="mb-0 text-success">R$ {{ number_format($total, 2, ',', '.') }}</h4>
                                </div>
                                
                                {{-- Botão Principal para o Checkout (Etapa 1) --}}
                                <a href="{{ route('checkout.user_data') }}" class="btn a-btn-finalizar w-100 btn-lg">
                                    Prosseguir para Checkout 
                                    <i class="bi bi-arrow-right-circle"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            @else
                {{-- Mensagem de Sacola Vazia --}}
                <div class="alert alert-info text-center mt-5" role="alert">
                    <h4 class="alert-heading">Sua sacola está vazia!</h4>
                    <p>Parece que você não adicionou nenhum produto ainda. Vamos às compras?</p>
                    <hr>
                    <a href="{{ route('home') }}" class="btn btn-primary">Ver Destaques</a>
                </div>
            @endif
        </div>
    </main>

    {{-- SEU MINI-CART OVERLAY (mantido como está no seu exemplo, mas não renderiza dados do BD aqui) --}}
    <div class="o-mini-cart-overlay" id="mini-cart-overlay">
        {{-- ... código do mini-cart overlay ... (deve ser atualizado via AJAX) --}}
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