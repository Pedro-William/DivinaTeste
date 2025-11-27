<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria</title>

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


<h1>Editar Categoria: {{ $categoria->nome }}</h1>

<div class="form-container">

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
    
    {{-- FORMULÁRIO DE EDIÇÃO --}}
    {{-- Action chama a rota de update, passando o objeto $categoria para o Route Model Binding --}}
    <form class="cadastro-form" action="{{ route('categ.update', $categoria) }}" method="POST">
        @csrf
        @method('PUT') {{-- OBRIGATÓRIO para rotas PUT/PATCH no Laravel --}}

        {{-- Nome --}}
        <div class="form-group">
            <label for="nome">Nome da Categoria:</label>
            <input type="text"
                   name="nome"
                   id="nome"
                   {{-- Preenche o campo com o valor atual ou com o valor antigo (old) em caso de erro --}}
                   value="{{ old('nome', $categoria->nome) }}" 
                   placeholder="DIGITE O NOVO NOME DA CATEGORIA"
                   required>
        </div>

        <button type="submit" class="btn-confirmar">Salvar Alterações</button>
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