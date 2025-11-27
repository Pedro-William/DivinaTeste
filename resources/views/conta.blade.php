<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta - Divina Essência</title>

    <link rel="stylesheet" href="{{ asset('css/atomic/app.css')}}"> 
    <link rel="stylesheet" href="{{ asset('css/atomic/layoutcarrinho.css')}}">



    <link rel="stylesheet" href="css/atomic/main.css"> 
    <link rel="stylesheet" href="css/atomic/atoms/form_elements.css"> 
    <link rel="stylesheet" href="css/atomic/molecules/inputform.css">
    <link rel="stylesheet" href="css/atomic/organisms/bloco.css">  

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                
                <a href="carrinho.html" class="a-icon-link" id="cart-icon-link">
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
                <li><a href="home/sabonetes" class="a-link">SABONETES</a></li>
                <li><a href="home/aromatizantes" class="a-link">AROMATIZANTES</a></li>
                <li><a href="home/velas" class="a-link">VELAS</a></li>
                <li><a href="home/oleos essenciais" class="a-link">ESSÊNCIAS</a></li>
                <li><a href="home/acessorios" class="a-link">ACESSÓRIOS</a></li>
                <li><a href="home/kits" class="a-link">KITS</a></li>
            </ul>
        </nav>
    </header>


 <div class="container-principal">
        <div class="breadcrumb">
            <a href="#">Home</a> / <span>Cadastrar</span>
        </div>


 <div class="container-principal">
        
        <h1 class="titulo-cadastro">MINHA CONTA</h1>

        <div class="form-container dados-conta-container">
            
            <h2 class="titulo-dados">Dados:</h2>

            <div class="bloco-dados">
                <p>E-mail: xxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
                <p>Nome: xxxxxxxxxxxxxxxxxxxxxxxx</p>
                <p>CPF: xxx.xxx.xxx-xx</p>
                <p>Data de nascimento: xx/xx/xx</p>
            </div>
            
            <button type="button" class="btn-cadastro btn-editar">
                <i class="fas fa-pencil-alt"></i> Editar
            </button>

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