@extends('adminlte::page')

@section('title', 'Actividades')

@section('content_header')
    <h1 class="text-center">Datos de la Actividad</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>Nombre de la Actividad:</h4>
                    <p>{{ $activity->activity_name }}</p>
                </div>
                <div class="col-md-6">
                    <h4>URL:</h4>
                    <p>{{ $activity->link }}</p>
                </div>
            </div>
            <h4>Fecha de Creación:</h4>
            <p>{{ $activity->created_at }}</p>
            <h4>Fecha de Actualización:</h4>
            <p>{{ $activity->updated_at }}</p>

            <iframe src="{{ $activity->link }}"
                style="border: 2px solid #000; border-radius: 10px; width: 100%; height: 600px;"></iframe>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
