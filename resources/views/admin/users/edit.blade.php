@extends('adminlte::page')

@section('title', 'Usuario')

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
                <br><br>
                <div>
                    <a class="btn btn-secondary" href="{{ route('login') }}">Ya registrado?</a>
                    <button class="vrd btn btn-success" type="submit">Registrar</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <style>
        .form-group {
            margin-bottom: 1rem;
        }

        .imgbord {
            border-radius: 15px;
            box-shadow: 10px 10px 5px grey;
        }
    </style>
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

        function triggerFileInput() {
            document.getElementById('profile_picture').click();
        }
    </script>
@endsection
