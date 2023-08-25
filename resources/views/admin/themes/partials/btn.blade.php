<div class="container">
    <a href="{{ route('themes.show', $id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
    <a href="{{ route('themes.edit', $id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
    <form action="{{ route('themes.destroy', $id) }}" method="POST" style="display: inline" class="formulario-eliminar">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger">
            <i class="fa fa-trash"></i>
        </button>
    </form>
</div>
<script script script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.formulario-eliminar').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Estas seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, bórralo!',
            cancelButtonText: '¡cancelar!'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });
</script>
