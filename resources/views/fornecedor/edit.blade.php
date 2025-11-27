<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Fornecedor</title>

    {{-- CSS local --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form-styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
</head>

<body class="form-body">

<button class="menu-btn" aria-label="Abrir menu" aria-expanded="false">&#9776;</button>

{{-- MENU LATERAL (Mantido sem alterações) --}}
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


<h1>Editar Fornecedor: {{ $fornecedor->nome }}</h1>

{{-- Mensagens de erro --}}
@if ($errors->any())
    <div style="color: red; margin-bottom: 20px;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Formulário --}}
<div class="form-container">
    <form class="cadastro-form" action="{{ route('fornecedor.update', $fornecedor->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- ---------------- DADOS PRINCIPAIS ---------------- --}}
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome', $fornecedor->nome) }}" placeholder="DIGITE O NOME DO FORNECEDOR" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email', $fornecedor->email) }}" placeholder="DIGITE O E-MAIL">
        </div>

        <div class="form-group">
            <label for="cnpj">CNPJ:</label>
            <input type="text" name="cnpj" id="cnpj" value="{{ old('cnpj', $fornecedor->cnpj) }}" placeholder="00.000.000/0000-00" oninput="mascaracnpj(this)">
        </div>

        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" id="telefone" value="{{ old('telefone', $fornecedor->telefone) }}" placeholder="(00) 00000-0000" oninput="mascaratelefone(this)">
        </div>

        {{-- ---------------- ENDEREÇO (Apenas campos na migração base) ---------------- --}}
        <div class="form-group">
            <label for="rua">Rua:</label>
            <input type="text" name="rua" id="rua" value="{{ old('rua', $fornecedor->rua) }}">
        </div>

        {{-- CAMPOS REMOVIDOS PARA EVITAR ERRO DE COLUNA INEXISTENTE (Se necessário, adicione-os via migração e Model)
        <div class="form-group">
            <label for="numero">Número:</label>
            <input type="text" name="numero" id="numero" value="{{ old('numero', $fornecedor->numero) }}">
        </div>

        <div class="form-group">
            <label for="bairro">Bairro:</label>
            <input type="text" name="bairro" id="bairro" value="{{ old('bairro', $fornecedor->bairro) }}">
        </div>
        --}}

        <div class="form-group">
            <label for="cidade">Cidade:</label>
            <input type="text" name="cidade" id="cidade" value="{{ old('cidade', $fornecedor->cidade) }}">
        </div>

        <div class="form-group">
            <label for="estado">Estado:</label>
            <input type="text" name="estado" id="estado" maxlength="2" value="{{ old('estado', $fornecedor->estado) }}">
        </div>

        <div class="form-group">
            <label for="cep">CEP:</label>
            <input type="text" name="cep" id="cep" value="{{ old('cep', $fornecedor->cep) }}">
        </div>
        
        {{-- CAMPO COMPLEMENTO REMOVIDO PARA EVITAR ERRO DE COLUNA INEXISTENTE --}}
        {{--
        <div class="form-group">
            <label for="complemento">Complemento:</label>
            <input type="text" name="complemento" id="complemento" value="{{ old('complemento', $fornecedor->complemento) }}">
        </div>
        --}}

        <button type="submit" class="btn-confirmar">Confirmar</button>
    </form>

    <div class="form-links">
        <a href="{{ route('painel') }}" class="btn btn-voltar">Voltar ao Painel</a>
        <a href="{{ route('fornecedor.index') }}" class="btn btn-lista">Listar Fornecedores</a>
    </div>
</div>

{{-- O script.js foi removido, e a lógica do menu hambúrguer foi mantida no final do corpo da página (boas práticas). --}}

<script>
    // Lógica do menu hambúrguer
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

    // Funções de máscara de CNPJ e Telefone
    document.addEventListener("DOMContentLoaded", function() {
        const cnpjInput = document.getElementById('cnpj');
        const telefoneInput = document.getElementById('telefone');

        // Adiciona event listeners para as máscaras
        if (cnpjInput) cnpjInput.addEventListener('input', function() { mascaracnpj(this); });
        if (telefoneInput) telefoneInput.addEventListener('input', function() { mascaratelefone(this); });
    });

    function mascaracnpj(campo) {
        campo.value = campo.value
            .replace(/\D/g, '')
            .replace(/^(\d{2})(\d)/, '$1.$2')
            .replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3')
            .replace(/\.(\d{3})(\d)/, '.$1/$2')
            .replace(/(\d{4})(\d)/, '$1-$2')
            .replace(/(-\d{2})\d+?$/, '$1');
    }

    function mascaratelefone(campo) {
        campo.value = campo.value
            .replace(/\D/g, '')
            .replace(/^(\d{2})(\d)/g, '($1) $2')
            .replace(/(\d{5})(\d)/, '$1-$2')
            .replace(/(-\d{4})\d+?$/, '$1');
    }
</script>
    <script src="{{ asset('js/script.js') }}"></script> 

</body>
</html>