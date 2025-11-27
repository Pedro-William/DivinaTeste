<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Subcategoria</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/list-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form-styles.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

    
</head>
<body class="form-body">

<button class="menu-btn" aria-label="Abrir menu" aria-expanded="false">&#9776;</button>

{{-- MENU LATERAL (Idêntico ao cadastro) --}}
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

<div class="form-container">
    <h1>Editar Subcategoria: {{ $subcategoria->nome }}</h1>

    {{-- Mensagens de erro de validação --}}
    @if ($errors->any())
        <div style="color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 10px; margin-bottom: 20px; border-radius: 4px;">
            **❌ Erro de Validação:**
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulário de Edição --}}
    {{-- ✅ CORREÇÃO APLICADA AQUI: Passando $subcategoria para a rota update --}}
<form class="cadastro-form" action="{{ route('subcategoria.update', $subcategoria) }}" method="POST">
            @csrf
        @method('PUT') {{-- Usa o método PUT para atualizar --}}

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" 
                   id="nome" 
                   name="nome" 
                   value="{{ old('nome', $subcategoria->nome) }}" 
                   placeholder="Ex: Camisetas, Monitores"
                   required>
            @error('nome')
                <p class="alert-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="categoria_id">Categoria:</label>
            <select id="categoria_id" name="categoria_id" required>
                <option value="">-- Selecione --</option>
                {{-- A variável $categorias é passada pelo Controller --}}
                @foreach($categorias as $cat)
                    <option value="{{ $cat->id }}" 
                        {{-- Verifica o valor antigo, ou o ID da categoria atual da subcategoria --}}
                        {{ old('categoria_id', $subcategoria->categoria_id) == $cat->id ? 'selected' : '' }}>
                        {{ $cat->nome }}
                    </option>
                @endforeach
            </select>
            @error('categoria_id')
                <p class="alert-error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn-confirmar">Confirmar</button>
    </form>

    <div class="form-links">
        <a href="{{ route('painel') }}" class="btn btn-voltar">Voltar ao Painel</a>
        <a href="{{ route('subcategoria.index') }}" class="btn btn-lista">Listar Subcategorias</a>
    </div>
</div>

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>