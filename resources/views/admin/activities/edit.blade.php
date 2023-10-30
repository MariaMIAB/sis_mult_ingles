@extends('adminlte::page')

@section('title', 'Actividades')

@section('content_header')
    <h1 class="text-center">Editar Actividades</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('activities.update', $activity) }} " enctype="multipart/form-data">
                @csrf
                @method('put')
                @include('admin.activities.partials._form')
                <br><br>
                <div>
                    <button class="vrd btn btn-success" type="submit">Guardar</button>
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

        .ck-editor__editable_inline {
            min-height: 150px;
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
