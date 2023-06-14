@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Editar Usuario</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <h2>Datos del Usuario</h2>
        <form method="POST" action="{{ route('users.update', $user) }} " enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('admin.users.partials._form')
            <br>
            <div>
                <a class="btn btn-secondary" href="{{ route('login') }}">Ya registrado?</a>
                <button class="vrd btn btn-success" type="submit">Registrar</button>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
    <script>
        function previewFile() {
            const preview = document.querySelector('#preview');
            const file = document.querySelector('input[type=file]').files[0];
            const reader = new FileReader();

            reader.addEventListener("load", function() {
                preview.src = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
