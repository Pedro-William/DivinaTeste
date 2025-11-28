<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>

    {{-- CSS local --}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
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

<h1>Editar Produto: {{ $produto->nome }}</h1>

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
    {{-- ATENÇÃO: enctype="multipart/form-data" não é mais estritamente necessário se não houver upload de arquivo, mas foi mantido por segurança. --}}
    <form class="cadastro-form" action="{{ route('produto.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ old('nome', $produto->nome) }}" required>
        </div>

        {{-- =============================================== --}}
        {{-- ✅ 2. Bloco de Imagem - APENAS URL --}}
        {{-- =============================================== --}}
        <div class="image-upload-section" style="border: 1px solid #ddd; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
            <h3>Imagem Atual</h3>
            @php
                // Lógica para determinar a fonte da imagem atual (URL externa ou arquivo local)
                $imageSource = asset('img/no-image.png');
                $isUrl = false;

                if ($produto->caminho_imagem) {
                    $isUrl = filter_var($produto->caminho_imagem, FILTER_VALIDATE_URL);
                    $imageSource = $isUrl ? $produto->caminho_imagem : asset('storage/' . $produto->caminho_imagem);
                }
            @endphp

            <div style="margin-bottom: 15px;">
                <img 
                    src="{{ $imageSource }}" 
                    alt="Imagem Atual" 
                    style="max-width: 150px; height: auto; border: 1px solid #ccc;"
                    onerror="this.onerror=null; this.src='{{ asset('img/no-image.png') }}';"
                >
            </div>

            <div class="form-group">
                {{-- ✅ Campo URL Externa: Nome 'imagem_url' é crucial para o Controller --}}
                <label for="imagem_url">URL da Imagem:</label>
                <input 
                    type="text" 
                    id="imagem_url" 
                    name="imagem_url" 
                    value="{{ old('imagem_url', $produto->caminho_imagem) }}" 
                    placeholder="Cole a URL externa aqui (Ex: https://...)"
                >
                <small>Insira a URL para substituir a imagem atual ou apague o campo para remover a imagem.</small>
            </div>
            
            {{-- REMOVIDO: Bloco 'OU' e campo de upload de arquivo 'imagem_file' --}}
        </div>
        {{-- =============================================== --}}

        <div class="form-group">
            <label for="fornecedor_id">Fornecedor:</label>
            <select id="fornecedor_id" name="fornecedor_id" required>
                <option value="">-- Selecione --</option>
                @foreach($fornecedores as $f)
                    <option value="{{ $f->id }}" {{ old('fornecedor_id', $produto->fornecedor_id) == $f->id ? 'selected' : '' }}>
                        {{ $f->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao">{{ old('descricao', $produto->descricao) }}</textarea>
        </div>

        <div class="form-group">
            <label for="valor">Valor:</label>
            {{-- Formatação do valor --}}
            <input type="number" id="valor" name="valor" step="0.01" value="{{ old('valor', number_format($produto->valor, 2, '.', '')) }}" required>
        </div>

        <div class="form-group">
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" value="{{ old('quantidade', $produto->quantidade) }}" required>
        </div>

        <div class="form-group">
            <label for="subcategoria_id">Subcategoria:</label>
            <select id="subcategoria_id" name="subcategoria_id" required>
                <option value="">-- Selecione --</option>
                @foreach($subcategorias as $s)
                    <option value="{{ $s->id }}" {{ old('subcategoria_id', $produto->subcategoria_id) == $s->id ? 'selected' : '' }}>
                        {{ $s->nome }}
                    </option>
                @endforeach
            </select>
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