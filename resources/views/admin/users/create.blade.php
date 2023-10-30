@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1 class="text-center">Registrar Usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                @csrf
                <div>
                    @include('admin.users.partials._form')
                    <br>
                </div>
                <div style="margin-top: 10px;">
                    <a class="btn btn-secondary" href="{{ route('login') }}" style="z-index: 1;">Ya registrado?</a>
                    <button class="btn btn-success" type="submit" style="z-index: 1;">Registrar</button>
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
@stop
