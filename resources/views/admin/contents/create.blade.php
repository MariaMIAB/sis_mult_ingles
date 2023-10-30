@extends('adminlte::page')

@section('title', 'Contenidos')

@section('content_header')
    <h1 class="text-center">Nuevo Contenido</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('contents.store') }}" enctype="multipart/form-data">
                @csrf
                <div>
                    @include('admin.contents.partials._form')
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

        .hidden {
            display: none;
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
            const file = document.querySelector('#content_image').files[0];
            console.log('archivo', file)
            const reader = new FileReader();

            reader.addEventListener("load", function() {
                preview.src = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }

        function triggerFileInput() {
            document.getElementById('content_image').click();
        }
    </script>
    <script script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/translations/es.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content_text'), {
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
