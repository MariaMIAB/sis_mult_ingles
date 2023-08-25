@extends('adminlte::page')

@section('title', 'Temas')

@section('content_header')
    <h1 class="text-center">Detalles del Tema</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body ">
            <div class="row col-md-12">
                <div class="col-6">
                    <h4>Tema:</h4>
                    <p>{{ $theme->theme_name }}</p>
                </div>

                <div class="col-6">
                    @if ($theme->theme_image)
                        <img class="imgbord" id="preview" alt="Image placeholder" height="100"
                            src="{{ Storage::url($theme->theme_image) }}"
                            onerror="this.src='/storage/imagenes/User_default.png'">
                    @else
                        <img class="imgbord" id="preview" src="/storage/imagenes/User_default.png" height="100"
                            alt="Vista previa de la imagen">
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <h4>Descripcion:</h4>
                <p>{!! $theme->description !!}</p>
            </div>
            <div class="col-md-6">
                <h4>Fecha de Creacion:</h4>
                <p>{{ $theme->created_at }}</p>
                <h4>Fecha de Actualizacion:</h4>
                <p>{{ $theme->updated_at }}</p>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .imgbord {
            border-radius: 15px;
            box-shadow: 10px 10px 5px grey;
        }
    </style>
@stop

@section('js')
@stop
