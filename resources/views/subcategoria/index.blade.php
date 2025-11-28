<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Subcategorias</title>

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/list-styles.css') }}">
    
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    
    {{-- ✅ 1. IMPORTADO: Bootstrap Icons para a lupa --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="listagem-body">

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


<div class="listagem-container">

    <header class="listagem-header">
        <h1>Lista de Subcategorias</h1>

        {{-- ✅ ESTRUTURA DE FILTRO IDÊNTICA À CATEGORIA, apontando para 'subcategoria.index' --}}
        <form action="{{ route('subcategoria.index') }}" method="GET" class="search-box">
            <input type="text" 
                    name="search"
                    placeholder="O que procura?"
                    value="{{ request('search') }}">
            
            {{-- Usando o código decimal que você usou na Categoria --}}
                <button type="submit" aria-label="Pesquisar"><i class="bi bi-search"></i></button>
        </form>
    </header>
    
    {{-- Mensagens de Sessão --}}
    @if (session('success'))
        <div style="color: green; margin-bottom: 15px; padding: 10px; border: 1px solid green; background-color: #e6ffe6; border-radius: 4px;">
            ✅ {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div style="color: red; margin-bottom: 15px; padding: 10px; border: 1px solid red; background-color: #ffeeee; border-radius: 4px;">
            ❌ {{ session('error') }}
        </div>
    @endif


    <div class="tabela-wrapper">
        <table>
            <thead>
                <tr>
                    <th class="col-id">ID</th>
                    {{-- Ajustei a largura aqui, pois agora temos 4 colunas --}}
                    <th class="col-nome" style="width: 35%;">NOME</th> 
                    <th class="col-categoria" style="width: 35%;">CATEGORIA PRINCIPAL</th> 
                    <th class="col-acoes">AÇÕES</th>
                </tr>
            </thead>

            <tbody>
                {{-- O nome da variável de subcategorias deve ser $subcategorias, conforme sua listagem anterior --}}
                @forelse($subcategorias as $sub) 
                    <tr>
                        <td>{{ $sub->id }}</td>
                        <td>{{ $sub->nome }}</td>
                        {{-- Acessa a categoria associada --}}
                        <td>{{ $sub->categoria->nome ?? 'N/A' }}</td>

                        <td class="acoes-btns">
                            {{-- Visualizar (Se existir) --}}
                            <a href="{{ route('subcategoria.show', $sub->id) }}" class="action-view" title="Visualizar">&#128065;</a>
                            
                            {{-- Editar --}}
                            <a href="{{ route('subcategoria.edit', $sub->id) }}" class="action-edit" title="Editar">&#x270E;</a>

                            {{-- Deletar --}}
                            <form action="{{ route('subcategoria.destroy', $sub->id) }}" method="POST"
                                style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir a subcategoria: {{ $sub->nome }}?');">
                                @csrf
                                @method('DELETE')
                                <button class="action-delete" title="Excluir">&#x2716;</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align:center; padding: 20px;">
                            Nenhuma subcategoria cadastrada ou encontrada com o termo "{{ request('search') }}".
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="controles-inferiores">

        <div class="botoes-acao">
            <a href="{{ route('subcategoria.create') }}" class="btn btn-cadastrar">CADASTRAR</a>
            <a href="{{ route('painel') }}" class="btn btn-voltar">VOLTAR PARA PAINEL</a>
        </div>

        {{-- Laravel Pagination --}}
        <div class="paginacao">
            @if(isset($subcategorias) && $subcategorias instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{-- Renderiza os links de paginação e inclui o termo 'search' na URL --}}
                {{ $subcategorias->appends(['search' => request('search')])->links() }}
            @endif
        </div>

    </div>
</div>

<script src="{{ asset('js/script.js') }}"></script>

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

</body>
</html>