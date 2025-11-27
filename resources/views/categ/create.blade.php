<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Categoria</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form-styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
</head>

<body class="form-body">

    <button class="menu-btn" aria-label="Abrir menu" aria-expanded="false">&#9776;</button>

    {{-- MENU LATERAL --}}
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
                <li class="category"><a href="#">PRODUTO</a>
                    <ul class="submenu">
                        <li><a href="{{ route('produto.index') }}">LISTAR</a></li>
                        <li><a href="{{ route('produto.create') }}">CADASTRAR</a></li>
                    </ul>
                </li>

                <li class="category"><a href="#">FORNECEDOR</a>
                    <ul class="submenu">
                        <li><a href="{{ route('fornecedor.index') }}">LISTAR</a></li>
                        <li><a href="{{ route('fornecedor.create') }}">CADASTRAR</a></li>
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


    <h1>Cadastrar Categoria</h1>

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

        <form class="cadastro-form" action="{{ route('categ.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome"
                    placeholder="DIGITE O NOME DA CATEGORIA" value="{{ old('nome') }}" required>
            </div>

            <button type="submit" class="btn-confirmar">Confirmar</button>
        </form>

        <div class="form-links">
            <a href="{{ route('painel') }}" class="btn btn-voltar">Voltar ao Painel</a>
            <a href="{{ route('categ.index') }}" class="btn btn-lista">Listar Categorias</a>
        </div>

    </div>

    <script>
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
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>