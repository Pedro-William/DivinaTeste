<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Administrador</title>
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form-styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
</head>

<body class="form-body">

    <button class="menu-btn" aria-label="Abrir menu" aria-expanded="false">&#9776;</button>

    <div class="hamburguer">
        <img class="logo" src="{{ asset('img/Logo.png') }}" alt="Logo">

        <nav class="nav">
            <ul>
                <li class="category"><a href="#">ADMINISTRADOR</a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.index') }}">LISTAR</a></li>
                        <li><a href="{{ route('admin.create') }}">CADASTRAR</a></li>
                    </ul>
                </li>
                <li class="category"><a href="#">CATEGORIA</a>
                    <ul class="submenu">
                        <li><a href="{{ route('categ.index') }}">LISTAR</a></li>
                        <li><a href="{{ route('categ.create') }}">CADASTRAR</a></li>
                    </ul>
                </li>
                <li class="category"><a href="#">FORNECEDOR</a>
                    <ul class="submenu">
                        <li><a href="{{ route('fornecedor.index') }}">LISTAR</a></li>
                        <li><a href="{{ route('fornecedor.create') }}">CADASTRAR</a></li>
                    </ul>
                </li>
                <li class="category"><a href="#">PRODUTO</a>
                    <ul class="submenu">
                        <li><a href="{{ route('produto.index') }}">LISTAR</a></li>
                        <li><a href="{{ route('produto.create') }}">CADASTRAR</a></li>
                    </ul>
                </li>
                <li class="category"><a href="#">SUBCATEGORIA</a>
                    <ul class="submenu">
                        <li><a href="{{ route('subcategoria.index') }}">LISTAR</a></li>
                        <li><a href="{{ route('subcategoria.create') }}">CADASTRAR</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>


    <h1>Cadastrar Administrador</h1>

    {{-- MENSAGENS DE ERRO --}}
    @if ($errors->any())
        <div style="color: red; margin-bottom: 20px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORMULÁRIO --}}
    <div class="form-container">

        <form class="cadastro-form" action="{{ route('admin.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name"
                    placeholder="DIGITE SEU NOME" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"
                    placeholder="DIGITE SEU EMAIL" value="{{ old('email') }}" required>
            </div>

            <div class="form-group password-group">
                <label for="password">Senha:</label>

                <div class="password-input-wrapper">
                    <input type="password" id="password" name="password"
                        placeholder="DIGITE SUA SENHA" required minlength="6">

                    <span class="password-toggle" onclick="togglePasswordVisibility()">
                        <i class="bi bi-eye"></i>
                    </span>
                </div>
            </div>


            <button type="submit" class="btn-confirmar">Confirmar</button>
        </form>

        <div class="form-links">
            <a href="{{ route('painel') }}" class="btn btn-voltar">Voltar ao Painel</a>
            <a href="{{ route('admin.index') }}" class="btn btn-lista">Listar Administradores</a>
        </div>

    </div>

    {{-- ✅ Incluindo script.js (se for necessário em outras views) --}}
    <script src="{{ asset('js/script.js') }}"></script>

    {{-- SCRIPTS JS ESSENCIAIS --}}
    <script>
        // Lógica para alternar a visualização da senha
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const icon = document.querySelector('.password-toggle i');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                passwordField.type = 'password';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }
        
        // LÓGICA DO MENU HAMBÚRGUER 
        document.addEventListener('DOMContentLoaded', () => {
            const menuBtn = document.querySelector('.menu-btn');
            const hamburguerMenu = document.querySelector('.hamburguer');

            if (menuBtn && hamburguerMenu) {
                menuBtn.addEventListener('click', () => {
                    // Adiciona/Remove a classe 'open'
                    hamburguerMenu.classList.toggle('open'); 
                    
                    // Atualiza o estado para acessibilidade
                    const isExpanded = menuBtn.getAttribute('aria-expanded') === 'true' || false;
                    menuBtn.setAttribute('aria-expanded', !isExpanded);
                });
            }
        });
    </script>
</body>
</html>