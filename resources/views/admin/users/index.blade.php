@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('users.create') }}" class="btn btn-success">Crear Nuevo Usuario</a>
            <br><br>
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('css')
    <!-- Css Titulo -->
    <style>
        h1 {
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.2rem;
            color: #07558d;
            text-shadow: 2px 2px #bdaedf;
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


    <script>
        $(function() {
            var table = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('users.indexData') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'role',
                        name: 'role'
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
@stop
