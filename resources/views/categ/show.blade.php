<td class="acoes-btns">
    {{-- Botão de Editar (Já existe no seu código) --}}
    <a href="{{ route('categ.edit', $c) }}" class="action-edit" title="Editar">&#x270E;</a>

    {{-- FORMULÁRIO DE EXCLUSÃO --}}
    <form action="{{ route('categ.destroy', $c) }}" method="POST"
        style="display:inline;" 
        onsubmit="return confirm('Tem certeza que deseja excluir esta categoria: {{ $c->nome }}?');">
        @csrf
        @method('DELETE')
        <button class="action-delete" title="Excluir">&#x2716;</button>
    </form>
</td>