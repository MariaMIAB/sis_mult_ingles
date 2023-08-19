@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>Usuarios</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>Usuario:</h4>
                    <p>{{ $user->name }} {{ $user->surname }}</p>
                </div>
                <div class="col-md-6">
                    @if ($user->profile_picture)
                        <img class="imgbord" id="preview" alt="Image placeholder" height="100"
                            src="{{ Storage::url($user->profile_picture) }}"
                            onerror="this.src='/storage/imagenes/User_default.png'">
                    @else
                        <img id="preview" src="/storage/imagenes/User_default.png" height="100"
                            alt="Vista previa de la imagen">
                    @endif
                </div>
            </div>
            <h4>Rol:</h4>
            @forelse ($user->roles as $role)
                <p>{{ $role->name }}</p>
            @empty
                <p>No tiene un rol</p>
            @endforelse
            <h4>Correo:</h4>
            <p>{{ $user->email }}</p>
            <h4>Fecha de Creacion:</h4>
            <p>{{ $user->created_at }}</p>
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
