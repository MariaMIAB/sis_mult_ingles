<a href="{{ route('users.show', $id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
<a href="{{ route('users.edit', $id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
<form action="{{ route('users.destroy', $id) }}" method="POST" style="display: inline" class="formulario-eliminar">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">
        <i class="fa fa-trash"></i>
    </button>
</form>
