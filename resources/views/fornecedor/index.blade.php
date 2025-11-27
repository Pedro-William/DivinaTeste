<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Fornecedores</title>

    {{-- CSS local do projeto --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/list-styles.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    {{-- ✅ IMPORTADO: Bootstrap Icons para a lupa --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
            <h1>Lista de Fornecedores</h1>
            
            <form action="{{ route('fornecedor.index') }}" method="GET" class="search-box">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="O que procura?" 
                    value="{{ request('search') }}"
                >
                <button type="submit" aria-label="Pesquisar"><i class="bi bi-search"></i></button>
            </form>
            
        </header>

        <div class="tabela-wrapper">
            <table>
                <thead>
                    <tr>
                        <th class="col-id">ID</th>
                        <th class="col-nome">NOME</th>
                        <th>EMAIL</th>
                        <th>CNPJ</th>
                        <th>ENDEREÇO</th>
                        <th>TELEFONE</th>
                        <th class="col-acoes">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($fornecedores as $f)
                    <tr>
                        <td>{{ $f->id }}</td>
                        <td>{{ $f->nome }}</td>
                        <td>{{ $f->email }}</td>
                        <td>{{ $f->cnpj }}</td>
                        {{-- ⚠️ ATENÇÃO: Verifique se o campo 'numero' existe na sua tabela fornecedores --}}
                        <td>{{ $f->rua }}, {{ $f->numero ?? 's/n' }} - {{ $f->cidade }}, {{ $f->estado }}</td> 
                        <td>{{ $f->telefone }}</td>
                        <td class="acoes-btns">
                            <a href="{{ route('fornecedor.edit', $f->id) }}" class="action-edit" title="Editar">&#x270E;</a>
                            <form action="{{ route('fornecedor.destroy', $f->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Tem certeza que deseja excluir este fornecedor?')"
                                        style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-delete" title="Excluir">&#x2716;</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" style="text-align:center; padding:20px;">Nenhum fornecedor cadastrado ou encontrado.</td> 
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="controles-inferiores">
            <div class="botoes-acao">
                <a href="{{ route('fornecedor.create') }}" class="btn btn-cadastrar">CADASTRAR</a>
                <a href="{{ route('painel') }}" class="btn btn-voltar">VOLTAR PARA PAINEL</a>
            </div>

            <div class="paginacao">
                {{-- ✅ CHAMA OS LINKS DE PAGINAÇÃO DO LARAVEL --}}
                {{ $fornecedores->links() }}
            </div>
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