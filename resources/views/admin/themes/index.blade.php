@extends('adminlte::page')

@section('title', 'Temas')

@section('content_header')
<h1>Lista de Temas</h1>
@stop


@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Listado de Temas</h2>
            <a href="{{ route('themes.create') }}" class="btn btn-success">Crear nuevo</a>
        </div>
        <br>
        <table id="table" class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Temas</th>
                    <th>Opciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
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
            {data: 'tema', name: 'tema'},
            {data: 'btn', name: 'btn', orderable: false, searchable: false},

        ],
        language: {
            emptyTable: "No hay registros disponibles"
        }
    });
});
    </script>
@stop