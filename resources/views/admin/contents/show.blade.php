@extends('adminlte::page')

@section('title', 'T-Contenido')

@section('content_header')
    <h1 class="text-center">Detalles del Contenido</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body ">
            <div class="row">
                <div class="col-md-6">
                    <h4>Contenido:</h4>
                    <p>{{ $content->content_name }}</p>
                    <h4>Texto:</h4>
                    <p>{!! $content->content_text !!}</p>
                    <h4>Fecha de Creacion:</h4>
                    <p>{{ $content->created_at }}</p>
                    <h4>Fecha de Actualizacion:</h4>
                    <p>{{ $content->updated_at }}</p>
                </div>
                <div class="col-md-6">
                    @if ($content->content_image)
                        <img class="img-fluid imgbord" id="preview" alt="Image placeholder"
                            src="{{ Storage::url($content->content_image) }}"
                            onerror="this.src='/storage/imagenes/herramientas_digitales.jpg'">
                    @else
                        <img class="img-fluid imgbord" id="preview" src="/storage/imagenes/herramientas_digitales.jpg"
                            alt="Vista previa de la imagen">
                    @endif
                </div>
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
    <!-- Css Titulo -->
    <style>
        h1 {
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.2rem;
            color: #07558d;
            text-shadow: 2px 2px #bdaedf;
        }
    </style>
@stop

@section('js')
@stop
