<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Cadastro - Divina Essência</title>
    
    {{-- Conexão CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atomic/organisms/form-styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    {{--  BIBLIOTECAS CSS: É melhor carregar primeiro Bootstrap e ícones --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    {{--  CARREGAMENTO DE FONTES EXTERNAS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    
</head>


<body class="form-body">

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
                        <a href="/minha conta" class="a-dropdown-link">Minha conta</a>
                        <a href="/meus pedidos" class="a-dropdown-link">Meus Pedidos</a>
                        <a href="/sair" class="a-dropdown-link">Sair</a>
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
                <li><a href="/sabonetes" class="a-link">SABONETES</a></li>
                <li><a href="/aromatizantes" class="a-link">AROMATIZANTES</a></li>
                <li><a href="/velas" class="a-link">VELAS</a></li>
                <li><a href="/oleos essenciais" class="a-link">ESSÊNCIAS</a></li>
                <li><a href="/acessorios" class="a-link">ACESSÓRIOS</a></li>
                <li><a href="/kits" class="a-link">KITS</a></li>
            </ul>
        </nav>
    </header>

    
    <div class="form-wrapper">
        <h1 class="titulo-cadastro" style="text-align: center;">NOVO CADASTRO</h1>

        {{-- Exibe mensagens de erro de validação do Laravel --}}
        @if ($errors->any())
            <div style="color: red; margin-bottom: 20px; text-align: center; border: 1px solid #ffdddd; padding: 10px; background-color: #fffafa;">
                <p style="font-weight: bold; margin-bottom: 5px;">Houve um erro no seu cadastro:</p>
                <ul style="list-style: none; padding: 0;">
                    @foreach($errors->all() as $error)
                        <li>❌ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="form-container">
            
            {{-- ✅ ACTION e METHOD CORRIGIDOS: POST para route('register') --}}
            <form method="POST" action="{{ route('register') }}" class="cadastro-form">
                @csrf {{-- ✅ TOKEN CSRF OBRIGATÓRIO --}}
                
                <div class="coluna-esquerda">
                    
                    {{-- Nome --}}
                    <div class="campo-grupo">
                        <label for="name">Nome</label>
                        <input type="text" 
                               id="name" 
                               name="name" {{-- ✅ name: 'name' --}}
                               placeholder="DIGITE SEU NOME" 
                               value="{{ old('name') }}"
                               required autofocus>
                    </div>

                    {{-- Sobrenome --}}
                    <div class="campo-grupo">
                        <label for="sobrenome">Sobrenome</label>
                        <input type="text" 
                               id="sobrenome" 
                               name="sobrenome" {{-- ✅ name: 'sobrenome' --}}
                               placeholder="DIGITE SEU SOBRENOME" 
                               value="{{ old('sobrenome') }}"
                               required>
                    </div>

                    {{-- CPF --}}
                    <div class="campo-grupo">
                        <label for="cpf">CPF</label>
                        <input type="text" 
                               id="cpf" 
                               name="cpf" {{-- ✅ name: 'cpf' --}}
                               placeholder="XXX.XXX.XXX-XX" 
                               pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" 
                               value="{{ old('cpf') }}"
                               required>
                    </div>

                    
                    {{-- Data de nascimento --}}
                    <div class="campo-grupo">
                        <label for="data-nascimento">Data de nascimento</label>
                        <div class="data-nascimento">
                            <select name="dia" id="dia" required> {{-- ✅ name: 'dia' --}}
                                <option value="" disabled {{ old('dia') == '' ? 'selected' : '' }}>DIA</option>
                                @for ($i = 1; $i <= 31; $i++)
                                    <option value="{{ $i }}" {{ old('dia') == $i ? 'selected' : '' }}>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                @endfor
                            </select>
                            <select name="mes" id="mes" required> {{-- ✅ name: 'mes' --}}
                                <option value="" disabled {{ old('mes') == '' ? 'selected' : '' }}>MÊS</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}" {{ old('mes') == $i ? 'selected' : '' }}>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                @endfor
                            </select>
                            <select name="ano" id="ano" required> {{-- ✅ name: 'ano' --}}
                                <option value="" disabled {{ old('ano') == '' ? 'selected' : '' }}>ANO</option>
                                @for ($i = date('Y'); $i >= (date('Y') - 100); $i--)
                                    <option value="{{ $i }}" {{ old('ano') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>

                <div class="coluna-direita">
                    
                    {{-- E-mail --}}
                    <div class="campo-grupo">
                        <label for="email">E-mail</label>
                        <input type="email" 
                               id="email" 
                               name="email" {{-- ✅ name: 'email' --}}
                               placeholder="DIGITE SEU E-MAIL" 
                               value="{{ old('email') }}"
                               required>
                    </div>

                    {{-- Senha --}}
                    <div class="campo-grupo">
                        <label for="password">Senha</label>
                        <div class="input-com-icone">
                            <input type="password" 
                                   id="password" 
                                   name="password" {{-- ✅ name: 'password' --}}
                                   placeholder="DIGITE SUA SENHA" 
                                   required autocomplete="new-password">
                            <i class="fas fa-eye toggle-password" data-target="password"></i> 
                        </div>
                    </div>

                    {{-- Confirma Senha --}}
                    <div class="campo-grupo">
                        <label for="password_confirmation">Confirme sua senha</label>
                        <div class="input-com-icone">
                            <input type="password" 
                                   id="password_confirmation" 
                                   name="password_confirmation" {{-- ✅ name: 'password_confirmation' --}}
                                   placeholder="DIGITE SUA SENHA" 
                                   required autocomplete="new-password">
                            <i class="fas fa-eye toggle-password" data-target="password_confirmation"></i> 
                        </div>
                    </div>

                    <div class="opcoes-e-envio align-left-desktop"> 
                        <div class="checkbox-grupo">
                            {{-- Promocionais --}}
                            <input type="checkbox" id="promocionais" name="promocionais" {{ old('promocionais') ? 'checked' : '' }}>
                            <label for="promocionais">Receber e-mails promocionais</label>
                        </div>

                        {{-- Botão de Envio --}}
                        <button type="submit" class="btn-cadastro">Cadastrar</button>

                    </div>
                </div>
            </form>
        </div>
        
        {{-- Link de volta para o Login --}}
        <div style="text-align: center; margin-top: 20px;">
            <p>Já tem uma conta? <a href="{{ route('login') }}" style="color: #A36A00; text-decoration: none;">Acesse sua conta</a></p>
        </div>
    </div>

    {{-- Script para toggle-password (requer JS e FontAwesome CSS) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.toggle-password').forEach(icon => {
                icon.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const targetInput = document.getElementById(targetId);
                    
                    if (targetInput.type === 'password') {
                        targetInput.type = 'text';
                        this.classList.remove('fa-eye');
                        this.classList.add('fa-eye-slash');
                    } else {
                        targetInput.type = 'password';
                        this.classList.remove('fa-eye-slash');
                        this.classList.add('fa-eye');
                    }
                });
            });
        });
    </script>

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
</body>
</html>