<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Categorias</title>

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/list-styles.css') }}">
    
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    

<body class="listagem-body">

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


<div class="listagem-container">

    <header class="listagem-header">
        <h1>Lista de Categorias</h1> {{-- Alterado de volta para 'Categorias' --}}

        {{-- ✅ CORREÇÃO: Estrutura da busca copiada da view de Administradores --}}
        <form action="{{ route('categ.index') }}" method="GET" class="search-box">
            <input type="text" 
                    name="search"
                    placeholder="O que procura?"
                    value="{{ request('search') }}">
                <button type="submit" aria-label="Pesquisar"><i class="bi bi-search"></i></button>
        </form>
    </header>

    <div class="tabela-wrapper">
        <table>
            <thead>
                <tr>
                    <th class="col-id">ID</th>
                    <th class="col-nome" style="width: 80%;">NOME</th>
                    <th class="col-acoes">AÇÕES</th>
                </tr>
            </thead>

            <tbody>
                @forelse($categs as $c)
                    <tr>
                        <td>{{ $c->id }}</td>
                        {{-- NOME DA CATEGORIA: (Mantido) --}}
                        <td>{{ $c->nome ?? $c->name }}</td>

                        <td class="acoes-btns">
                            <a href="{{ route('categ.edit', $c->id) }}" class="action-edit" title="Editar">&#x270E;</a>

                            <form action="{{ route('categ.destroy', $c->id) }}" method="POST"
                                style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir esta categoria?');">
                                @csrf
                                @method('DELETE')
                                <button class="action-delete" title="Excluir">&#x2716;</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" style="text-align:center;">Nenhuma categoria cadastrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="controles-inferiores">

        <div class="botoes-acao">
            <a href="{{ route('categ.create') }}" class="btn btn-cadastrar">CADASTRAR</a>
            <a href="{{ route('painel') }}" class="btn btn-voltar">VOLTAR PARA PAINEL</a>
        </div>

        {{-- Laravel Pagination --}}
        <div class="paginacao">
            {{-- Renderiza os links de paginação e inclui o termo 'search' na URL --}}
            {{ $categs->appends(['search' => request('search')])->links() }}
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