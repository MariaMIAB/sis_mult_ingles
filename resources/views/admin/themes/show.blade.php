@extends('adminlte::page')

@section('title', 'Temas')

@section('content_header')
    <h1 class="text-center">Detalles del Tema</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body ">
            <div class="row">
                <div class="col-md-6">
                    <h4>Tema:</h4>
                    <p>{{ $theme->theme_name }}</p>
                    <h4>Descripcion:</h4>
                    <p>{!! $theme->description !!}</p>
                    <h4>Fecha de Creacion:</h4>
                    <p>{{ $theme->created_at }}</p>
                    <h4>Fecha de Actualizacion:</h4>
                    <p>{{ $theme->updated_at }}</p>
                </div>
                <div class="col-md-6">
                    @if ($theme->theme_image)
                        <img class="img-fluid imgbord" id="preview" alt="Image placeholder"
                            src="{{ Storage::url($theme->theme_image) }}"
                            onerror="this.src='/storage/imagenes/User_default.png'">
                    @else
                        <img class="img-fluid imgbord" id="preview" src="/storage/imagenes/User_default.png"
                            alt="Vista previa de la imagen">
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('contents.create', ['id' => $theme->id]) }}" class="btn btn-success">Crear contenido</a>
            </div>
            <br>
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Temas</th>
                        <th>Contenido</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('css')
    <style>
        .imgbord {
            border-radius: 15px;
            box-shadow: 10px 10px 5px grey;
        }
    </style>
    <!-- Css Botones -->
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }
    </style>
    <!-- jQuery DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@stop

@section('js')
    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- jQuery DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js">
    </script>
    <!-- Tablas -->
    <script>
        $(function() {
            var table = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('themes.showContents', ['id' => $theme->id]) }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'content_name',
                        name: 'content_name'

                    },
                    {
                        data: 'content_name',
                        name: 'content_name'

                    },
                    {
                        data: 'btn',
                        name: 'btn',
                        orderable: false,
                        searchable: false
                    },
                ],
                language: {
                    decimal: '',
                    emptyTable: 'No hay información',
                    info: 'Mostrando _START_ a _END_ de _TOTAL_ Entradas',
                    infoEmpty: 'Mostrando 0  0 of 0 Entradas',
                    infoFiltered: '(Filtrado de _MAX_ total entradas)',
                    infoPostFix: '',
                    thousands: ',',
                    lengthMenu: 'Mostrar _MENU_ Entradas',
                    loadingRecords: 'Cargando...',
                    processing: 'Procesando...',
                    search: 'Buscar:',
                    zeroRecords: 'Sin resultados encontrados',
                    paginate: {
                        first: 'Primero',
                        last: 'Ultimo',
                        next: '>>',
                        previous: '<<'
                    }
                },
            });
        });
    </script>
    <!-- Sweetaler -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'EL registro ha sido eliminado.',
                'success'
            )
        </script>
    @endif
@stop
