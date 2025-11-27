<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Produto</title>

    {{-- CSS local --}}
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

<h1>Cadastrar Produto</h1>

{{-- Mensagens de sucesso ou erro --}}
@if (session('success'))
    <div style="color: green; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div style="color: red; margin-bottom: 20px;">
        <p>⚠️ **Ocorreu um erro ao cadastrar o produto:**</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Formulário --}}
<div class="form-container">
    {{-- ✅ REMOVIDO: enctype="multipart/form-data" --}}
    <form class="cadastro-form" action="{{ route('produto.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required>
        </div>

        {{-- INÍCIO: BLOCO DE IMAGEM (APENAS URL) --}}
        
        <div class="form-group">
            <label for="imagem_url">
                URL da Imagem (Cole o link aqui):
                <a href="https://freeimage.host/a/divina-essencia-vl.Qwwen?sort=date_desc&page=2&seek=fqNR3LF" 
                    target="_blank" 
                    title="Abrir galeria para copiar a URL">
                    (Galeria de Imagens)
                </a>
            </label>
            <input 
                type="text" 
                id="imagem_url" 
                name="imagem_url" 
                value="{{ old('imagem_url') }}" 
                placeholder="Ex: https://i.imgur.com/seulink.jpg"
            >
            <small>Este campo é opcional. Se preenchido, deve ser uma URL válida.</small>
        </div>

        {{-- REMOVIDO: Campo de upload de arquivo (imagem_file) --}}
        
        {{-- FIM: BLOCO DE IMAGEM --}}

        <div class="form-group">
            <label for="fornecedor_id">Fornecedor:</label>
            <select id="fornecedor_id" name="fornecedor_id" required>
                <option value="">-- Selecione --</option>
                @foreach($fornecedores as $f)
                    <option value="{{ $f->id }}" {{ old('fornecedor_id') == $f->id ? 'selected' : '' }}>
                        {{ $f->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="subcategoria_id">Subcategoria:</label>
            <select id="subcategoria_id" name="subcategoria_id" required>
                <option value="">-- Selecione --</option>
                @foreach($subcategorias as $s)
                    <option value="{{ $s->id }}" {{ old('subcategoria_id') == $s->id ? 'selected' : '' }}>
                        {{ $s->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="number" id="valor" name="valor" step="0.01" value="{{ old('valor') }}" required>
        </div>

        <div class="form-group">
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" value="{{ old('quantidade') }}" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao">{{ old('descricao') }}</textarea>
        </div>

        <button type="submit" class="btn-confirmar">Confirmar</button>
    </form>

    <div class="form-links">
        <a href="{{ route('painel') }}" class="btn btn-voltar">Voltar ao Painel</a>
        <a href="{{ route('produto.index') }}" class="btn btn-lista">Listar Produtos</a>
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