@extends('adminlte::page')
@section('title', 'Ver')
@section('content_header')
    <h1>Temas</h1>
@stop
@section('content')
    <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Tema:</h4>
                        <p>{{ $theme->theme_name }}</p>
                    </div>
                    <div class="col-md-6">
                        @if ($theme->theme_image)
                            <img id="preview" alt="Image placeholder" height="100"
                                src="{{ Storage::url($theme->theme_image) }}"
                                onerror="this.src='/storage/imagenes/User_default.png'">
                        @else
                            <img id="preview" src="/storage/imagenes/User_default.png" height="100"
                                alt="Vista previa de la imagen">
                        @endif
                    </div>
                </div>
                <h4>Fecha de Creacion:</h4>
                <p>{{ $theme->created_at }}</p>
                <p>{{ $theme->updated_at }}</p>
            </div>
        </div>
@stop
@section('css')
@stop

@section('js')
@stop

