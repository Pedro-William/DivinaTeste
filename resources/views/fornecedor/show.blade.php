<h1>Fornecedor: {{ $fornecedor->name }}</h1>

<p>Email: {{ $fornecedor->email }}</p>
<p>Telefone: {{ $fornecedor->telefone }}</p>

<h3>Endereço:</h3>
<p>{{ $fornecedor->rua }}, {{ $fornecedor->numero }}</p>
<p>{{ $fornecedor->bairro }} - {{ $fornecedor->cidade }}/{{ $fornecedor->estado }}</p>
<p>CEP: {{ $fornecedor->cep }}</p>
<p>Complemento: {{ $fornecedor->complemento }}</p>

<a href="{{ route('fornecedor.index') }}">Voltar</a>
