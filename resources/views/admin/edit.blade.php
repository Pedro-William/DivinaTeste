<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Administrador</title>
    
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



<h1>Editar Administrador: {{ $admin->name }}</h1>
<div class="form-container">

    {{-- FORM TRUE DO LARAVEL --}}
    <form class="cadastro-form" action="{{ route('admin.update', $admin->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Nome --}}
        <div class="form-group">
            <label for="adm_nome">Nome Completo:</label>
            <input type="text" 
                       name="name" 
                       id="adm_nome"
                       value="{{ old('name', $admin->name) }}" 
                       placeholder="DIGITE NOME COMPLETO" 
                       required>
        </div>

        {{-- Email --}}
        <div class="form-group">
            <label for="adm_email">Email:</label>
            <input type="email" 
                       name="email" 
                       id="adm_email"
                       value="{{ old('email', $admin->email) }}" 
                       placeholder="DIGITE SEU EMAIL" 
                       required>
        </div>

        {{-- Senha --}}
        <div class="form-group password-group">
            <label for="senha">Nova Senha (opcional):</label>
            <div class="password-input-wrapper">
                <input type="password" 
                               id="senha" 
                               name="password" 
                               placeholder="DEIXE VAZIO PARA NÃO ALTERAR">
                <span class="password-toggle" onclick="togglePasswordVisibility()">
                    <i class="bi bi-eye"></i>
                </span>
            </div>
        </div>

    

        <button type="submit" class="btn-confirmar">Confirmar</button>
    </form>

    <div class="form-links">
        <a href="{{ route('painel') }}" class="btn btn-voltar">Voltar para Painel</a>
        <a href="{{ route('admin.index') }}" class="btn btn-lista">Listar Administradores</a>
    </div>
</div>

{{-- O script.js deve conter a lógica para abrir e fechar o menu --}}
<script src="{{ asset('js/script.js') }}"></script>

<script>
    function togglePasswordVisibility() {
        const passwordField = document.getElementById('senha');
        const toggleIcon = document.querySelector('.password-toggle i');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleIcon.classList.remove('bi-eye');
            toggleIcon.classList.add('bi-eye-slash');
        } else {
            passwordField.type = 'password';
            toggleIcon.classList.remove('bi-eye-slash');
            toggleIcon.classList.add('bi-eye');
        }
    }
    
    // 💡 Implementação direta do Menu (Se não quiser mexer no script.js)
    document.addEventListener('DOMContentLoaded', () => {
        const menuBtn = document.querySelector('.menu-btn');
        const hamburguerMenu = document.querySelector('.hamburguer');

        if (menuBtn && hamburguerMenu) {
            menuBtn.addEventListener('click', () => {
                hamburguerMenu.classList.toggle('open'); 
                const isExpanded = menuBtn.getAttribute('aria-expanded') === 'true' || false;
                menuBtn.setAttribute('aria-expanded', !isExpanded);
            });
        }
    });
</script>

</body>
</html>