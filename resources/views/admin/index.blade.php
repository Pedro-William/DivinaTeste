<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Administradores</title>

    {{-- CSS local do projeto --}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/list-styles.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
</head>

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
            <h1>Lista de Administradores</h1>

            <form action="{{ route('admin.index') }}" method="GET" class="search-box">
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
                        <th class="col-nome">NOME</th>
                        <th class="col-nome">EMAIL</th>
                        <th class="col-acoes">AÇÕES</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($allAdmin as $admin)
                    <tr>
                        <td>{{ $admin->id }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td class="acoes-btns">
                            <a href="{{ route('admin.show', $admin->id) }}" class="action-view" title="Visualizar">&#128065;</a>
                            <a href="{{ route('admin.edit', $admin->id) }}" class="action-edit" title="Editar">&#x270E;</a>
                            <form action="{{ route('admin.destroy', $admin->id) }}"
                                method="POST"
                                onsubmit="return confirm('Tem certeza que deseja excluir o administrador {{ $admin->name }}?')"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-delete" title="Excluir">&#x2716;</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 20px;">
                            Nenhum administrador encontrado. 
                            @if(request('search'))
                                <p>Tente refinar sua pesquisa ou <a href="{{ route('admin.index') }}">limpar o filtro</a>.</p>
                            @else
                                <p>Cadastre um novo administrador.</p>
                            @endif
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

        <div class="controles-inferiores">

            <div class="botoes-acao">
                <a href="{{ route('admin.create') }}" class="btn btn-cadastrar">CADASTRAR</a>
                <a href="{{ route('painel') }}" class="btn btn-voltar">VOLTAR PARA PAINEL</a>
            </div>

            <div class="paginacao">
                {{-- Renderiza os links de paginação e inclui o termo 'search' na URL --}}
                {{ $allAdmin->appends(['search' => request('search')])->links() }}
            </div>

        </div>

    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>