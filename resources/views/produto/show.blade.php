<h1>Detalhes do Produto</h1>

<p><strong>ID:</strong> {{ $product->id }}</p>
<p><strong>Nome:</strong> {{ $product->nome }}</p>

<p><strong>Imagem:</strong></p>
<img src="{{ $product->imagem_url }}" width="200">

<p><strong>Fornecedor:</strong> {{ $product->fornecedor->nome }}</p>
<p><strong>Subcategoria:</strong> {{ $product->subcategoria->name }}</p>

<p><strong>Descrição:</strong><br>
{{ $product->descricao }}</p>

<p><strong>Valor:</strong> R$ {{ number_format($product->valor, 2, ',', '.') }}</p>

<p><strong>Quantidade:</strong> {{ $product->quantidade }}</p>

<br>
<a href="{{ route('product.index') }}">Voltar</a>
