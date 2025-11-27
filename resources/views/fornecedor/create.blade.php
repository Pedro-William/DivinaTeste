<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Fornecedor</title>

    {{-- CSS local do projeto --}}
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

    <h1>Cadastrar Fornecedor</h1>

    {{-- Mensagens de erro --}}
    @if ($errors->any())
        <div style="color: red; margin-bottom: 20px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulário --}}
    <div class="form-container">
        <form class="cadastro-form" action="{{ route('fornecedor.store') }}" method="POST">
            @csrf

            {{-- ---------------- DADOS PRINCIPAIS ---------------- --}}
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="Nome do fornecedor" value="{{ old('nome') }}" required>
            </div>

            <div class="form-group">
                <label for="cnpj">CNPJ:</label>
                <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ (Ex: 00.000.000/0000-00)" value="{{ old('cnpj') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Email do fornecedor" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" id="telefone" placeholder="Telefone" value="{{ old('telefone') }}">
            </div>

            {{-- ---------------- ENDEREÇO (Apenas campos na migração original) ---------------- --}}
            <div class="form-group">
                <label for="rua">Rua:</label>
                <input type="text" name="rua" id="rua" placeholder="Rua" value="{{ old('rua') }}">
            </div>
            
            {{-- BLOCOS DE NÚMERO, BAIRRO E COMPLEMENTO REMOVIDOS PARA EVITAR ERROS DE DB/MODEL --}}

            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" name="cidade" id="cidade" placeholder="Cidade" value="{{ old('cidade') }}">
            </div>

            <div class="form-group">
                <label for="estado">Estado (UF):</label>
                <input type="text" name="estado" id="estado" maxlength="2" placeholder="UF" value="{{ old('estado') }}">
            </div>

            <div class="form-group">
                <label for="cep">CEP:</label>
                <input type="text" name="cep" id="cep" placeholder="CEP" value="{{ old('cep') }}">
            </div>

            <button type="submit" class="btn-confirmar">Confirmar</button>
        </form>

        <div class="form-links">
            <a href="{{ route('painel') }}" class="btn btn-voltar">Voltar ao Painel</a>
            <a href="{{ route('fornecedor.index') }}" class="btn btn-lista">Listar Fornecedores</a>
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