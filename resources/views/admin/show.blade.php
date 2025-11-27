<form action="{{ route('admin.destroy', $admin->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Excluir</button>
</form>
