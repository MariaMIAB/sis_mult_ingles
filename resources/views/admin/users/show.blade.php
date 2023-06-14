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
                            <img id="preview" alt="Image placeholder" height="100"
                                src="{{ Storage::url($user->profile_picture) }}"
                                onerror="this.src='/storage/imagenes/pf-picture.webp'">
                        @else
                            <img id="preview" src="/storage/imagenes/pf-picture.webp" height="100"
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
@stop

@section('js')
@stop

