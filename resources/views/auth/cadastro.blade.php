<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Divina Essência</title>

    
    
    

    <link rel="stylesheet" href="{{ asset('css/atomic/app.css')}}"> 
    <link rel="stylesheet" href="{{ asset('css/atomic/atoms/form-elements.css')}}"> 
    <link rel="stylesheet" href="{{ asset('css/atomic/molecules/inputform.css')}}">
    <link rel="stylesheet" href="{{ asset('css/atomic/layoutform.css')}}">
    <link rel="stylesheet" href="{{ asset('css/atomic/atoms/buttons.css')}}"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header class="o-header">
        <div class="o-header__top">
            <div class="a-logo">
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
                        <a href="/home/minha conta" class="a-dropdown-link">Minha conta</a>
                        <a href="/home/meus pedidos" class="a-dropdown-link">Meus Pedidos</a>
                        <a href="/home/sair" class="a-dropdown-link">Sair</a>
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


        <h1 class="titulo-cadastro"> NOVO CADASTRO</h1>

        <div class="form-container">
            <form action="#" method="POST" class="cadastro-form">
                
                <div class="coluna-esquerda">
                    
                    <div class="campo-grupo">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" placeholder="DIGITE SEU NOME" required>
                    </div>

                    <div class="campo-grupo">
                        <label for="sobrenome">Sobrenome</label>
                        <input type="text" id="sobrenome" name="sobrenome" placeholder="DIGITE SEU SOBRENOME" required>
                    </div>

                    <div class="campo-grupo">
                        <label for="cpf">CPF</label>
                        <input type="text" id="cpf" name="cpf" placeholder="XXX.XXX.XXX-XX" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required>
                    </div>

                    <div class="campo-grupo">
                        <label for="contato">Contato</label>
                        <input type="tel" id="contato" name="contato" placeholder="(XX) XXXXX-XXXX" pattern="\(\d{2}\) \d{5}-\d{4}" required>
                    </div>

                    <div class="campo-grupo">
                        <label for="data-nascimento">Data de nascimento</label>
                        <div class="data-nascimento">
                            <select name="dia" id="dia">
                                <option value="" disabled selected>DIA</option>
                                </select>
                            <select name="mes" id="mes">
                                <option value="" disabled selected>MÊS</option>
                                </select>
                            <select name="ano" id="ano">
                                <option value="" disabled selected>ANO</option>
                                </select>
                        </div>
                    </div>
                </div>

                <div class="coluna-direita">
                    
                    <div class="campo-grupo">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="DIGITE SEU E-MAIL" required>
                    </div>

                    <div class="campo-grupo">
                        <label for="senha">Senha</label>
                        <div class="input-com-icone">
                            <input type="password" id="senha" name="senha" placeholder="DIGITE SUA SENHA" required>
                            <i class="fas fa-eye toggle-password" data-target="senha"></i> 
                        </div>
                    </div>

                    <div class="campo-grupo">
                        <label for="confirma-senha">Confirme sua senha</label>
                        <div class="input-com-icone">
                            <input type="password" id="confirma-senha" name="confirma-senha" placeholder="DIGITE SUA SENHA" required>
                            <i class="fas fa-eye toggle-password" data-target="confirma-senha"></i> 
                        </div>
                    </div>

                    <div class="opcoes-e-envio align-left-desktop"> <div class="checkbox-grupo">
                            <input type="checkbox" id="promocionais" name="promocionais">
                            <label for="promocionais">Receber e-mails promocionais</label>
                        </div>

                         <a href="login.html" class="btn-cadastro">Cadastro</a> 

                    
                    </div>

                </div>

            </form>
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