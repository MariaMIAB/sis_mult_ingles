@extends('adminlte::page')

@section('title', 'Actividades')

@section('content_header')
@stop

@section('content')
    <div style="margin-top: 20px;">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center my-3">Registrar Actividad</h3>
                <form method="POST" action="{{ route('activities.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        @include('admin.activities.partials._form')
                        <br>
                    </div>
                    <div style="margin-top: 10px;">
                        <button class="btn btn-success" type="submit" style="z-index: 1;">Guardar</button>
                    </div>
                </form>
            </div>
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
