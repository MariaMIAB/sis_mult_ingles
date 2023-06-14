@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')
<a href="{{ route('users.create') }}" class="btn btn-success">Crear nuevo Usuario</a>
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
@stop

@section('css')
<!-- jQuery DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@stop

@section('js')
<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- jQuery DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>


    <script>
$(function () {
    var table = $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.indexData') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'role' , name: 'role'},
            {data: 'btn', name: 'btn', orderable: false, searchable: false},

        ],
        language: {
            emptyTable: "No hay registros disponibles"
        }
    });
});
    </script>
@stop