<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirme Seus Dados</title>
    <link rel="stylesheet" href="{{ asset('css/atomic/app.css')}}"> 
    <link rel="stylesheet" href="{{ asset('css/atomic/molecules/botoesconfirm.css')}}"> 
    <link rel="stylesheet" href="{{ asset('css/atomic/organisms/layoutconfirm.css')}}"> 
</head>
    
<body>
    <header class="o-header">
        <div class="o-header__top">
            <div class="a-logo">
                <a href="home.html">
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
                        <a href="minhaconta.html" class="a-dropdown-link">Minha conta</a>
                        <a href="meuspedidos.html" class="a-dropdown-link">Meus Pedidos</a>
                        <a href="sair.html" class="a-dropdown-link">Sair</a>
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
                <li><a href="home/sabonetes" class="a-link">SABONETES</a></li>
                <li><a href="home/aromatizantes" class="a-link">AROMATIZANTES</a></li>
                <li><a href="home/velas" class="a-link">VELAS</a></li>
                <li><a href="home/oleos essenciais" class="a-link">ESSÊNCIAS</a></li>
                <li><a href="home/acessorios" class="a-link">ACESSÓRIOS</a></li>
                <li><a href="home/kits" class="a-link">KITS</a></li>
            </ul>
        </nav>
    </header>

    <div class="header-nav">
        <a href="#">Home</a> / <a href="#">Sobre nós</a>
    </div>

    <div class="container">
        <h1>Confirme seus dados</h1>

        <div class="content-wrapper">
            <div class="dados-container">
                
                <div class="dados-bloco">
                    <h2>MINHA CONTA</h2>
                    <div class="dados-pessoais-box">
                        <h3>Dados:</h3>
                        <p><strong>E-mail:</strong> xxxxxxxxxxxxxxxxxxxxxxxx</p>
                        <p><strong>Nome:</strong> xxxxxxxxxxxxxxxxxxxxxxxx</p>
                        <p><strong>CPF:</strong> xxx.xxx.xxx-xx</p>
                        <p><strong>Data de nascimento:</strong> xx/xx/xx</p>
                        <button class="botao-editar">
                            <span class="icone-lapis" role="img" aria-label="Ícone de lápis">✏️</span> Editar
                        </button>
                    </div>
                </div>

                <div class="dados-bloco">
                    <h3>Endereços salvos:</h3>
                    
                    <div class="dados-box endereco-box"> 
                        
                        <div class="icones-endereco">
                            <span class="icone-acao" role="button" aria-label="Excluir endereço">🗑️</span>
                            <span class="icone-acao" role="button" aria-label="Editar endereço">✏️</span>
                            <span class="icone-acao" role="checkbox" aria-checked="false" aria-label="Selecionar como principal">□</span> 
                        </div>
                        
                        <p><strong>Nome do destinatário:</strong> xxxxx xxxxx</p>
                    </div> 
                    
                    <button class="botao-adicionar-endereco">
                        + Adicionar endereço
                    </button>
                </div>

            </div>

            <div class="resumo-pedido-container">
                <h2>Resumo do pedido</h2>
                
                <div class="item-carrinho">
                    <img src="placeholder-produto.png" alt="Bucha vegetal" class="imagem-produto">
                    <div class="detalhes-item">
                        <p class="nome-produto">Bucha vegetal</p>
                        <div class="quantidade-preco">
                            <span class="quantidade">qtd <span class="valor-quantidade">1</span></span>
                            <span class="preco-item">R$ 30,00</span>
                        </div>
                    </div>
                </div>

                <div class="separador"></div>

                <div class="totais-pedido">
                    <div class="linha-total">
                        <span class="label-total">Total de pedidos:</span>
                        <span class="valor-total">R$ 30,00</span>
                    </div>
                    <div class="linha-total">
                        <span class="label-total">Frete:</span>
                        <span class="valor-total">R$ 05,00</span>
                    </div>
                    <div class="linha-total subtotal">
                        <span class="label-total">Subtotal:</span>
                        <span class="valor-total">R$ 35,00</span>
                    </div>
                </div>
                
                <button class="botao-pagamento">
                    Ir para o pagamento
                </button>
            </div>
        </div>
    </div>

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
    <script src="js/script.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    </body>
    </html>