<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>

    {{-- CSS local do projeto --}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/list-styles.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

    {{-- IMPORTADO: Bootstrap Icons para a lupa e ações --}}
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
            <h1>Lista de Produtos</h1>
            
            {{-- Formulário de Pesquisa --}}
            <form action="{{ route('produto.index') }}" method="GET" class="search-box">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="O que procura?" 
                    value="{{ request('search') }}"
                >
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
                        <th class="col-imagem">IMAGEM</th>
                        <th class="col-nome">NOME</th>
                        <th>FORNECEDOR</th>
                        <th>SUBCATEGORIA</th>
                        <th>VALOR</th>
                        <th>QUANTIDADE</th>
                        <th class="col-acoes">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produtos as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        
                        {{-- BLOCO CORRIGIDO: Garante que o caminho seja gerado corretamente --}}
                        <td class="col-imagem">
                            @php
                                // Define a imagem de "sem foto" como padrão
                                $imageSource = asset('img/no-image.png'); 

                                if ($p->caminho_imagem) {
                                    // 1. Verifica se é uma URL (http/https)
                                    $isUrl = filter_var($p->caminho_imagem, FILTER_VALIDATE_URL);
                                    
                                    // 2. Define a fonte: URL direta ou caminho de armazenamento (storage/)
                                    $imageSource = $isUrl ? $p->caminho_imagem : asset('storage/' . $p->caminho_imagem);
                                }
                            @endphp

                            <img 
                                src="{{ $imageSource }}" 
                                alt="Imagem do Produto {{ $p->nome }}" 
                                style="max-width: 50px; height: auto;"
                                onerror="this.onerror=null; this.src='{{ asset('img/no-image.png') }}';" {{-- Fallback em caso de erro de carregamento (URL quebrada) --}}
                            >
                        </td>
                        
                        <td>{{ $p->nome }}</td>
                        <td>{{ $p->fornecedor->nome ?? '-' }}</td>
                        <td>{{ $p->subcategoria->nome ?? '-' }}</td>
                        {{-- Formatação de Valor --}}
                        <td>R$ {{ number_format($p->valor ?? 0, 2, ',', '.') }}</td>
                        <td>{{ $p->quantidade }}</td>
                        <td class="acoes-btns">
                            {{-- Ícones de Ação --}}
                            <a href="{{ route('produto.edit', $p->id) }}" class="action-edit" title="Editar"><i class="bi bi-pencil-square"></i></a>
                            
                            {{-- Botão de Excluir --}}
                            <form action="{{ route('produto.destroy', $p->id) }}"
                                method="POST"
                                onsubmit="return confirm('Tem certeza que deseja excluir o produto: {{ $p->nome }}?')"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-delete" title="Excluir">&#x2716;</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" style="text-align:center; padding:20px;">
                            Nenhum produto cadastrado ou encontrado.
                            @if(request('search'))
                                <p>Tente refinar sua pesquisa.</p>
                            @endif
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="controles-inferiores">
            <div class="botoes-acao">
                <a href="{{ route('produto.create') }}" class="btn btn-cadastrar">CADASTRAR</a>
                <a href="{{ route('painel') }}" class="btn btn-voltar">VOLTAR PARA PAINEL</a>
            </div>

            <div class="paginacao">
                {{-- Paginação funcional --}}
                @if(isset($produtos) && $produtos instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    {{ $produtos->links() }}
                @endif
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