@extends('adminlte::page')

@section('title', 'Temas')

@section('content_header')
    <h1 class="text-center">Registrar Tema</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('themes.store') }}" enctype="multipart/form-data">
                @csrf
                <div>
                    @include('admin.themes.partials._form')
                    <br>
                </div>
                <div style="margin-top: 10px;">
                    <button class="btn btn-success" type="submit" style="z-index: 1;">Guardar</button>
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
            var preview = document.querySelector('#preview');
            var file = document.querySelector('#theme_image').files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }


        function triggerFileInput() {
            document.getElementById('theme_image').click();
        }
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/translations/es.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'), {
                language: 'es'
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@stop
