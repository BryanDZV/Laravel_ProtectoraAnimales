@extends('layout.layout')
@section('content')
    <div class="container mt-4">
        <h1>Dashboard Cuidador</h1>
        <p>Bienvenido, {{ auth()->user()->name }}</p>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Mis Tareas</h5>
                        <p class="card-text">Tareas asignadas de cuidado</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection