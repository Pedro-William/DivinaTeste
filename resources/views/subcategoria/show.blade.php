<form action="{{ route('admin.destroy', $admin->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este administrador?');" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" style="background-color:red; color:white; border:none; padding:5px 10px; cursor:pointer;">
        Excluir
    </button>
</form>
