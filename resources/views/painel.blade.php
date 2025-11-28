<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Administrador | Divina Essência</title>

    <link rel="stylesheet" href="{{ asset('css/main.css')}}"> 
    <link rel="stylesheet" href="{{ asset('css/atomic/atoms/painel.css') }}">

    <link rel="icon" type="image/png" href="{{ asset('img/Logo.png') }}">
</head>
<img class="logo" src="../img/Logo.png" alt="Logo">
<body class="painel-admin-body">

    <!-- Botão hamburguer -->
    <button class="menu-btn" aria-label="Abrir menu" aria-expanded="false">&#9776;</button>

    <!-- MENU LATERAL -->
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


    <!-- CARDS DO PAINEL -->
    <div class="painel-cards-container">

        <a href="{{ route('admin.index') }}">
            <img src="{{ asset('img/logo_administrador.png') }}" alt="Administradores">
        </a>

        <a href="{{ route('categ.index') }}">
            <img src="{{ asset('img/logo_categorias.png') }}" alt="Categorias">
        </a>

        <a href="{{ route('fornecedor.index') }}">
            <img src="{{ asset('img/logo_fornecedores.png') }}" alt="Fornecedores">
        </a>

        <a href="{{ route('produto.index') }}">
            <img src="{{ asset('img/logo_produtos.png') }}" alt="Produtos">
        </a>

        <a href="{{ route('subcategoria.index') }}">
            <img src="{{ asset('img/logo_subcategorias.png') }}" alt="Subcategorias">
        </a>

        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-logout" style="
            background-color: #A30000; /* Vermelho forte /
            border: none;
            cursor: pointer; 
            color: white;
            padding: 10px 15px; 
            border-radius: 5px; 
            font-weight: bold;
            margin-top: 20px; / Para separá-lo dos cards */
            transition: background-color 0.3s;
        " onmouseover="this.style.backgroundColor='#800000';" onmouseout="this.style.backgroundColor='#A30000';">
            Sair (Logout)
        </button>

    </form>


    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
